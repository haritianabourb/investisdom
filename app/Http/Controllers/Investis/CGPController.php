<?php

namespace App\Http\Controllers\Investis;

use App\Contact;
use App\TauxCGP;
use App\TypeContrat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \App\CGP;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PDF;
use Illuminate\Foundation\Bus\DispatchesJobs;

;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Facades\Voyager;

class CGPController extends VoyagerBaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function store(Request $request)
    {
        if ($inputs = $request->get('cgp_belongstomany_contact_relationship')) {
            $rules = ["rules" =>
                ["cgp_belongstomany_contact_relationship" => "sometimes|array" ]
            ];
            foreach ($inputs as $key => $val) {
                $rules["rules"]["cgp_belongstomany_contact_relationship.{$key}"] = 'different:contact_id';
            }
            $rules["messages"]["cgp_belongstomany_contact_relationship.*"] = 'Le responsable ne peut être ajouter aux contacts supplémentaires';

            $validator = Validator::make($request->all(), $rules['rules'], $rules['messages']);

            if ($validator->fails()) {
                $this->alertError(
                    $validator->messages()->all()
                );
                return redirect()->back()->with($this->alerts);
            }
        }

        return parent::store($request, $id);
    }

    public function update(Request $request, $id)
    {
        if ($inputs = $request->get('cgp_belongstomany_contact_relationship')) {
            $rules = ["rules" =>
                ["cgp_belongstomany_contact_relationship" => "sometimes|array" ]
            ];
            foreach ($inputs as $key => $val) {
                $rules["rules"]["cgp_belongstomany_contact_relationship.{$key}"] = 'different:contact_id';
            }
            $rules["messages"]["cgp_belongstomany_contact_relationship.*"] = 'Le responsable ne peut être ajouter aux contacts supplémentaires';

            $validator = Validator::make($request->all(), $rules['rules'], $rules['messages']);

            if ($validator->fails()) {
                $this->alertError(
                    $validator->messages()->all()
                );
                return redirect()->back()->with($this->alerts);
            }
        }

        return parent::update($request, $id);
    }

    public function generatePDF(Request $request, CGP $cgp)
    {
        $this->authorize('browse', $cgp);

        $data['nom'] = $cgp->name;
        $data['adresse'] = $cgp->address_1 . " " . ($cgp->address_2 ?: "");
        $data['cgpville'] = $cgp->city;
        $data['cgpcp'] = $cgp->postal_code;

        $data['forme_juridique'] = $cgp->juridical_registration;
        $data['immatriculation'] = $cgp->type_registration;
        $data['nom_representant'] = $cgp->contactId->firstname;
        $data['prenom'] = $cgp->contactId->lastname;

        $data['dateconvention'] = date("d-m-Y");
        $data['fonction'] = $cgp->contact_status;
        $data['civilite'] = "M.";
        $data['siret'] = $cgp->registered_key;
        $data['capital'] = $cgp->capital;
        $data['lieu_immatriculation'] = $cgp->registration_city;
        $data['madate'] = date("d-m-Y");
        $data['annee'] = date("Y", strtotime(date("d-m-Y")));

        $pdf = PDF::loadView('pdf.cgps.convention', $data);

        return $pdf->download('Contrat_de_partenariat_' . $cgp->name . '.pdf');
    }

    public function getDocuments()
    {
        $contact = Contact::ofUser(Auth::user())->firstOrFail();
        $cgp = CGP::ofContact($contact, true)->first();

        $dataType = Voyager::model('DataType')->where('slug', '=', "cgps")->first();
        $dataTypeContent = call_user_func([$dataType->model_name, 'findOrFail'], $cgp->id);

        return view("voyager::cgps.documents.documents", compact('dataType', 'dataTypeContent'));
    }

    public function setDocument(Request $request, CGP $cgp = null)
    {
        if(!$cgp || ($cgp  && !Auth::user()->hasRole(['admin', 'investis', 'investisdom']))){
            $contact = Contact::ofUser(Auth::user())->firstOrFail();
            $cgp = CGP::ofContact($contact, true)->first();
        }

        $dataType = Voyager::model('DataType')->where('slug', '=', "cgps")->first();
        $dataTypeContent = call_user_func([$dataType->model_name, 'findOrFail'], $cgp->id);


        $rows = $dataType->editRows->whereIn("field", $request->keys());

        $this->insertUpdateData($request, 'cgps', $rows, $dataTypeContent);

        event(new BreadDataUpdated($dataType, $dataTypeContent));

        if(!Auth::user()->hasRole(['admin', 'investis', 'investisdom'])){
            return redirect()
                ->route('admin.documents.cgp', compact('dataType', 'dataTypeContent'))
                ->with([
                    'message' => __('voyager::generic.successfully_updated') . " {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);

        }

        return redirect()
            ->back()
            ->with([
                'message' => __('voyager::generic.successfully_updated') . " {$dataType->display_name_singular}",
                'alert-type' => 'success',
            ]);

    }

    public function simulator(){
        return view("investis.simulateur.simulator");
    }

    public function simulate(Request $request){
        $contact = Contact::ofUser(Auth::user())->first();
        $cgp = CGP::ofContact($contact)->first();

        // FIXME the contract_type must be have a code section or an Id or a rate maybe
        $contract_type = TypeContrat::where('slug', $request->input('contrat'))->first();

        $tauxCGP = TauxCGP::ofYear(Carbon::now()->format('Y'))
            ->where('cgps_id', $cgp->id)
            ->where('type_contrat_id', $contract_type->id)
            ->first();

        if($tauxCGP){
            $taux = $tauxCGP->mois{Carbon::now()->format('m')} ?? 26.4;
        }else{
            $taux = 26.60;
        }

        // TODO use the calculate builder
        $renta=$taux-$request->input('com_cgp');
        $taux2=($renta/100);
        $taux_recalcule=1+$taux2;
        $tot = 10000 - $request->input('montant_ri', 0);
        $tot2=18000-$request->input('montant_ri');
        $m=round(($tot2/0.44),2);
        $m2=round(($m/$taux_recalcule),2);

        // TODO set this request as 1st result

        if($request->input('montant_souscription')){
            $mri = $request->input('montant_souscription', 0) * $taux_recalcule; //montant réduction impôt
            $ms = $request->input('montant_souscription', 0) / $taux_recalcule; //montant souscription
            $gain = $mri - $request->input('montant_souscription', 0);
            $gain2 = $request->input('montant_souscription', 0) - $ms;
            if (old('mode_calcul', 0) == "souscription") {
                $mri2 = round((($mri / 100) * 0.1), 1);

            }else{
                $mri2 = round((($request->input('montant_souscription', 0) / 100) * 0.1), 1);
            }

            $frais1 = (($request->input('nb_snc', 0) * 60) + ($request->input('nb_snc', 0) * 75) + $mri2);
            $frais2 = (($request->input('nb_snc', 0) * 60) + $mri2);
        }

        session()->flashInput($request->toArray());

        return response()->view("investis.simulateur.simulator", array_merge(compact('tot', 'tot2', 'm', 'renta', 'taux', 'taux2', 'taux_recalcule', 'm2', 'mri', 'mri2', 'ms', 'gain', 'gain2', 'frais1', 'frais2'), $request->toArray()));

    }

}
