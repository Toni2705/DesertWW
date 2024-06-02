<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use PDF;


class PDFController extends Controller
{
    public function downloadPDF(Request $request)
    {
        $data = $request->all();
        $pdf = PDF::loadView('pdf.template', compact('data'));


        return $pdf->download('factura.pdf');
    }
}

