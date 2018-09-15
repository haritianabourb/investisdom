<?php

namespace App\Http\Controllers\Investis;

use Illuminate\Http\Request;
use \App\SNC;
// use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Routing\Controller as BaseController;
// use Illuminate\Foundation\Validation\ValidatesRequests;
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ReservationController extends VoyagerBaseController
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    //
    public function index(Request $request){
      // return parent::index($request);
      return view('investis.reservations.index');
    }



}
