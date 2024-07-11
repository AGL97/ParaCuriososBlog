<?php

namespace App\Http\Controllers;

use App\Exports\CardsExport;
use App\Imports\CardsImport;
use App\Models\Card;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AdminController extends Controller
{
  public function index(): View
  {
    $cards = Card::all();
    return view('admin.index',compact('cards'));
  }

  public function importExcel(Request $request):RedirectResponse{
    $request->validate([
      "document_csv" => "required|mimes:text,csv"
    ]);

    try {
      $file = $request->file('document_csv');
      Excel::import(new CardsImport,$file);
      return redirect()->back();
    } catch (\Exception $e) {
      throw $e;
    }
  }

  public function exportExcel ():BinaryFileResponse{
    return Excel::download(new CardsExport,'cards.csv');
  }
}
