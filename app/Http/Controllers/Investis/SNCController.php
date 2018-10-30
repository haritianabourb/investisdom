<?php

namespace App\Http\Controllers\Investis;

use Illuminate\Http\Request;
use \App\SNC;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SNCController extends VoyagerBaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    //
    public function bulkCreate(Request $request){
      $sncs = [];
      // TODO make the batch work
      if($nbr_snc = $request->input('nbr_snc')){
        $prefix = $request->input('prefix');
        for ($i=0; $i < $nbr_snc; $i++) {
           // $prefix."_".
           $lastId = SNC::get()->last()->id + 1;
           $snc = SNC::create([
             'name' => "$prefix $lastId",
             'type_entities_id' => 2
           ]);
          $sncs[] = $snc->name;
        }
      }

      $message = "Liste des SNC créé <br/>";
      foreach ($sncs as $snc) {
        $message .= "- ".$snc."<br/>";
      }

      return redirect()
          ->route("voyager.sncs.index")
          ->with([
              'message'    => $message,
              'alert-type' => 'success',
          ]);
    }

}
