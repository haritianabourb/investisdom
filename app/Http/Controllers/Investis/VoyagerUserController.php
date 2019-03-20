<?php

namespace App\Http\Controllers\Investis;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerUserController as BaseVoyagerUserController;
use Voyager;


class VoyagerUserController extends BaseVoyagerUserController
{

    // POST BR(E)AD
    public function update(Request $request, $id)
    {
        if (app('VoyagerAuth')->user()->getKey() == $id) {
            $request->merge([
                'role_id'                              => app('VoyagerAuth')->user()->role_id,
                'user_belongstomany_role_relationship' => app('VoyagerAuth')->user()->roles->pluck('id')->toArray(),
            ]);
        }

        $return = parent::update($request, $id);

        if(auth()->user()->hasRole(["admin", "investis"])){
            return $return;
        }

        return redirect()->route('voyager.profile');
    }

    //***************************************
    //
    //         Activate an item
    //
    //****************************************

    /**
     * @param Request $request
     * @param $id mixed|null
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activate(Request $request, $id)
    {


        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('edit', app($dataType->model_name));

        // Init array of IDs
        $ids = [];
        if (empty($id)) {
            // Bulk delete, get IDs from POST
            $ids = explode(',', $request->ids);
        } else {
            // Single item delete, get ID from URL
            $ids[] = $id;
        }
        foreach ($ids as $id) {
            $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);

            $model = app($dataType->model_name);
        }

        $displayName = count($ids) > 1 ? $dataType->display_name_plural : $dataType->display_name_singular;

        \Log::info("User Activated", ['User' => $data, "Model" => $model]);
        \Log::info("activate action on user model", ['User' => $data, "Model" => $model]);
        $res = $data->turnOn($ids);

        $data = $res
            ? [
                'message'    => __('voyager::generic.successfully_activated')." {$displayName}",
                'alert-type' => 'success',
            ]
            : [
                'message'    => __('voyager::generic.error_deleting')." {$displayName}",
                'alert-type' => 'error',
            ];

        if ($res) {
            \Log::info("User Event Activated Thrown", ['User' => $data, "Model" => $model]);
            \Log::info("TODO throw event action on user activated", ['User' => $data, "Model" => $model]);
            // event(new UserActivated($dataType, $data));

        }

        return redirect()->route("voyager.{$dataType->slug}.index")->with($data);
    }
}
