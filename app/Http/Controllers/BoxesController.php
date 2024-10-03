<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoxesController extends Controller
{
    public function index()
    {
        $boxes = auth()->user()->boxes()->paginate(6);
        return view('boxe.boxes', ['boxes' => $boxes]);
    }

    public function show(Request $request)
    {
        $user = auth()->user();
        $boxe = $user->boxes()->findOrFail($request->id);

        // Récupérer la boxe précédente
        $previousBox = $user->boxes()
            ->where('id', '<', $boxe->id)
            ->orderBy('id', 'desc')
            ->first();

        // Récupérer la boxe suivante
        $nextBox = $user->boxes()
            ->where('id', '>', $boxe->id)
            ->orderBy('id', 'asc')
            ->first();

        return view('boxe.boxe', compact('boxe', 'previousBox', 'nextBox'));
    }

    public function view_edit(Request $request)
    {
        $user = auth()->user();
        $boxe = $user->boxes()->findOrFail($request->id);
        return view('boxe.boxe-edit', compact('boxe'));
    }

    public function edit(Request $request)
    {
        $user = auth()->user();
        $boxe = $user->boxes()->findOrFail($request->id);
        $boxe->name = $request->name;
        $boxe->description = $request->description;
        $boxe->address = $request->address;
        $boxe->price = $request->price;
        $boxe->save();

        return view('boxe.boxe-edit', compact('boxe'));
    }

    public function destroy(Request $request)
    {
        $user = auth()->user();
        $boxe = $user->boxes()->findOrFail($request->id);
        $boxe->delete();
        return redirect()->route('boxes.index');
    }

}
