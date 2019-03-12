<?php

namespace App\Http\Controllers\Investis;

use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadImagesDeleted;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;
use TCG\Voyager\Http\Controllers\VoyagerBaseController as BaseVoyagerBaseController;

class VoyagerBaseController extends BaseVoyagerBaseController
{
  /**
   * POST BRE(A)D - Store data.
   *
   * @param \Illuminate\Http\Request $request
   *
   * @return \Illuminate\Http\RedirectResponse
   */
  public function store(Request $request)
  {
      $slug = $this->getSlug($request);

      $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

      // Check permission
      $this->authorize('add', app($dataType->model_name));

      // Validate fields with ajax
      $val = $this->validateBread($request->all(), $dataType->addRows);

      if ($val->fails()) {
          return redirect()->back()->with($this->alertError(
              $val->messages()
          ));
      }

      if (!$request->has('_validate')) {
          $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());

          event(new BreadDataAdded($dataType, $data));

          if ($request->ajax()) {
              return response()->json(['success' => true, 'data' => $data]);
          }

          return redirect()
              ->route('voyager.'.$dataType->slug.'.show', [$dataType->name => $data])
              ->with([
                      'message'    => __('voyager::generic.successfully_added_new')." {$dataType->display_name_singular}",
                      'alert-type' => 'success',
                  ]);
      }
  }

    //***************************************
    //                _____
    //               |  __ \
    //               | |__) |
    //               |  _  /
    //               | | \ \
    //               |_|  \_\
    //
    //  Read an item of our Data Type B(R)EAD
    //
    //****************************************

    public function show(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        $isSoftDeleted = false;

        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);

            // Use withTrashed() if model uses SoftDeletes and if toggle is selected
            if ($model && in_array(SoftDeletes::class, class_uses($model))) {
                $model = $model->withTrashed();
            }
            if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
                $model = $model->{$dataType->scope}();
            }

            if( method_exists($model, 'sluggable')){
                $dataTypeContent = (call_user_func([$model, 'findBySlugOrFail'], $id));
            }else{
                $dataTypeContent = call_user_func([$model, 'findOrFail'], $id);
            }

            if ($dataTypeContent->deleted_at) {
                $isSoftDeleted = true;
            }
        } else {
            // If Model doest exist, get data from table name
            $dataTypeContent = DB::table($dataType->name)->where('id', $id)->first();
        }

        // Replace relationships' keys for labels and create READ links if a slug is provided.
        $dataTypeContent = $this->resolveRelations($dataTypeContent, $dataType, true);

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'read');

        // Check permission
        $this->authorize('read', $dataTypeContent);

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        $view = 'voyager::bread.read';

        if (view()->exists("voyager::$slug.read")) {
            $view = "voyager::$slug.read";
        }

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable', 'isSoftDeleted'));
    }

    //***************************************
    //                ______
    //               |  ____|
    //               | |__
    //               |  __|
    //               | |____
    //               |______|
    //
    //  Edit an item of our Data Type BR(E)AD
    //
    //****************************************

    public function edit(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);

            // Use withTrashed() if model uses SoftDeletes and if toggle is selected
            if ($model && in_array(SoftDeletes::class, class_uses($model))) {
                $model = $model->withTrashed();
            }
            if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
                $model = $model->{$dataType->scope}();
            }

            if( method_exists($model, 'sluggable')){
                $dataTypeContent = call_user_func([$model, 'findBySlugOrFail'], $id);
            }else{
                $dataTypeContent = call_user_func([$model, 'findOrFail'], $id);
            }

        } else {
            // If Model doest exist, get data from table name
            $dataTypeContent = DB::table($dataType->name)->where('id', $id)->first();
        }

        foreach ($dataType->editRows as $key => $row) {
            $dataType->editRows[$key]['col_width'] = isset($row->details->width) ? $row->details->width : 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'edit');

        // Check permission
        $this->authorize('edit', $dataTypeContent);

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        $view = 'voyager::bread.edit-add';

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable'));
    }

  // POST BR(E)AD
  public function update(Request $request, $id)
  {
      $slug = $this->getSlug($request);

      $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

      // Compatibility with Model binding.
      $id = $id instanceof Model ? $id->{$id->getKeyName()} : $id;

      $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);

      // Check permission
      $this->authorize('edit', $data);

      // Validate fields with ajax
      $val = $this->validateBread($request->all(), $dataType->editRows, $dataType->name, $id);

      if ($val->fails()) {
          return response()->json(['errors' => $val->messages()]);
      }

      if (!$request->ajax()) {
          $this->insertUpdateData($request, $slug, $dataType->editRows, $data);

          event(new BreadDataUpdated($dataType, $data));

          return redirect()
              ->route('voyager.'.$dataType->slug.'.show', [$dataType->name => $data])
              ->with([
                  'message'    => __('voyager::generic.successfully_updated')." {$dataType->display_name_singular}",
                  'alert-type' => 'success',
              ]);
      }
  }
}
