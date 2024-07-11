<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class PdfController extends Controller
{
    public function generatePDF(int $id){
        
        $card = Card::find($id);

        $pdf = Pdf::setOption([
            'dpi' => 300 ,
            'defaultFont' => 'arial', 
            'defaultPaperSize' => 'letter'])->loadView('pdf',compact('card'));

        return $pdf->download(time().'.pdf');
    }
}
