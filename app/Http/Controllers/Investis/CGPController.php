<?php

namespace App\Http\Controllers\Investis;

use App\Contact;
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

    public function update(Request $request, $id)
    {
        if ($inputs = $request->get('cgp_belongstomany_contact_relationship')) {
            $rules = [];
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
        $contact = Contact::ofUser(Auth::user()->id)->firstOrFail();
        $cgp = CGP::ofContact($contact, true)->first();

        $dataType = Voyager::model('DataType')->where('slug', '=', "cgps")->first();
        $dataTypeContent = call_user_func([$dataType->model_name, 'findOrFail'], $cgp->id);

        return view("voyager::cgps.documents.documents", compact('dataType', 'dataTypeContent'));
    }

    public function setDocument(Request $request)
    {
        $contact = Contact::ofUser(Auth::user()->id)->firstOrFail();
        $cgp = CGP::ofContact($contact, true)->first();

        $dataType = Voyager::model('DataType')->where('slug', '=', "cgps")->first();
        $dataTypeContent = call_user_func([$dataType->model_name, 'findOrFail'], $cgp->id);


        $rows = $dataType->editRows->whereIn("field", $request->keys());

        $this->insertUpdateData($request, 'cgps', $rows, $dataTypeContent);

        event(new BreadDataUpdated($dataType, $dataTypeContent));

        return redirect()
            ->route('admin.documents.cgp', compact('dataType', 'dataTypeContent'))
            ->with([
                'message' => __('voyager::generic.successfully_updated') . " {$dataType->display_name_singular}",
                'alert-type' => 'success',
            ]);
    }

}
