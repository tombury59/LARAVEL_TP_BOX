<?php

namespace App\Http\Controllers;

use App\Models\Locataires;
use Illuminate\Http\Request;

class LocatairesController extends Controller
{
    public function index()
    {
        $locataires=Locataires::paginate(12);
        return view('locataire.locataires',compact('locataires'));
    }

    public function show($id)
    {
        $locataire=Locataires::find($id);
        $boxeslocataires=$locataire->boxes()->get();
        $reservations=$locataire->reservation()->get();

        return view('locataire.locataire',compact('locataire','boxeslocataires','reservations'));
    }


}
