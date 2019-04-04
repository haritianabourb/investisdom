<?php

namespace App\Http\Controllers\Investis;

use PDF;

use App\Contact;
use \App\CGP;
use App\TauxCGP;
use App\TypeContrat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Facades\Voyager;

use Carbon\Carbon;

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
                session()->flashInput($request->toArray());
                return redirect()->back()->with(["errors" => $val->messages()]);
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
                session()->flashInput($request->toArray());
                return redirect()->back()->with(["errors" => $val->messages()]);
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
        $cgp = CGP::ofContact($contact)->first();

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

        $typeContrat = TypeContrat::all("slug", "nom", "description");

        return view("investis.simulateur.simulator", compact('typeContrat'));
    }

    public function simulate(Request $request){

        $this->validate($request, [
            'montant_ri' => "required|numeric",
            'com_cgp' => "required|numeric",
            'montant_souscription' => "sometimes|required|numeric",
        ],
            [
                'montant_ri' => [
                    'required' => "le montant souhaité doit être renseigné.",
                ],
                'comm_cgp' => [
                    'required' => "la commission doit être renseigné.",
                ],

            ]);

        $tauxCGP = null;
        $contact = Contact::ofUser(Auth::user())->first();
        if($contact){
            $cgp = CGP::ofContact($contact)->first();

            // FIXME the contract_type must be have a code section or an Id or a rate maybe
            $contract_type = TypeContrat::where('slug', $request->input('contrat'))->first();

            if($contract_type){
                $tauxCGP = TauxCGP::ofYear(Carbon::now()->format('Y'))
                    ->where('cgps_id', $cgp->id)
                    ->where('type_contrat_id', $contract_type->id)
                    ->first();

//                $results["contrat"] = $contract_type;
            }

        }


        if($tauxCGP){
            $results['taux'] = $tauxCGP->{"mois_".Carbon::now()->format('n')} ?? 26.4;
        }else{
            $results['taux'] = 26.60;
        }

        // TODO use the calculate builder
        $results['renta'] =$results['taux']-$request->input('com_cgp');
        $results['taux2'] =($results['renta']/100);
        $results['taux_recalcule'] =1+$results['taux2'];
        $results['tot'] = 10000 - $request->input('montant_ri', 10000);
        $results['tot2'] = 18000-$request->input('montant_ri', 18000);
        $results['m'] =round(($results['tot2']/0.44),2);
        $results['m2'] =round(($results['m']/$results['taux_recalcule']),2);

        // TODO set this request as 1st result

        if($request->input('montant_souscription')){
            $results['mri'] = $request->input('montant_souscription', 0) * $results['taux_recalcule']; //montant réduction impôt
            $results['ms'] = $request->input('montant_souscription', 0) / $results['taux_recalcule']; //montant souscription
            $results['gain'] = $results['mri'] - $request->input('montant_souscription', 0);
            $results['gain2'] = $request->input('montant_souscription', 0) - $results['ms'];
            if (old('mode_calcul', 0) == "souscription") {
                $results['mri2'] = round((($results['mri'] / 100) * 0.1), 1);

            }else{
                $results['mri2'] = round((($request->input('montant_souscription', 0) / 100) * 0.1), 1);
            }

            $results['frais1'] = (($request->input('nb_snc', 0) * 60) + ($request->input('nb_snc', 0) * 75) + $results['mri2']);
            $results['frais2'] = (($request->input('nb_snc', 0) * 60) + $results['mri2']);
        }

        $results['typeContrat'] = $typeContrat = TypeContrat::all("slug", "nom", "description");

        session()->flashInput($request->toArray());

        return response()->view("investis.simulateur.simulator", array_merge($results, $request->toArray()));

    }

}
