<?php

namespace App\Http\Controllers\Investis;

use Illuminate\Http\Request;
use \App\CGP;
use PDF;
use Voyager;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PDFTestController extends VoyagerBaseController
{

    public function generatePDF(Request $request){

//        return view('pdf.cgps.conventiontest');
        //return view('pdf.soc-cl.soc-cl');

            $pdf = PDF::loadView('pdf.soc-cl.soc-cl');

            return $pdf->download('view.pdf');

}

}
