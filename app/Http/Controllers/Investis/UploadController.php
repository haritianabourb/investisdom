<?php

namespace App\Http\Controllers\Investis;

use TCG\Voyager\Events\BreadDataUpdated;
use Validator;
use \App\Mandat;
// use \App\Services\Calculate;
use \App\Http\Traits\HasFieldsToCalculate;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Voyager;

class UploadController extends VoyagerBaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, HasFieldsToCalculate;

    protected $calculate_name = "mandat";

    public function upload(Request $request, $slug, $id){

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);

        // Check permission
        $this->authorize('edit', $data);

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->editRows->where("type", "file"), $dataType->name, $id);

        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }

        if (!$request->ajax()) {
            $this->insertUpdateData($request, $slug, $dataType->editRows->where("type", "file"), $data);

            event(new BreadDataUpdated($dataType, $data));

            return redirect()
                ->back()
                ->with([
                    'message'    => __('voyager::generic.successfully_updated')." {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);
        }
    }

}
