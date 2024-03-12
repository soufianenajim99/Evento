<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class pdfController extends Controller
{
    public function download() {
        $pdf = Pdf::loadView('pdf.pdf');
     
        return $pdf->download();
    }
}