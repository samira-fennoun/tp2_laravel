<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::select()->paginate(10);
        return view('etudiants.index', ['etudiants' => $etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view('etudiants.create', ['villes' => $villes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $etudiant = new Etudiant;

        $etudiant->nom = $request->input('nom');
        $etudiant->adresse = $request->input('adresse');
        $etudiant->phone = $request->input('phone');
        $etudiant->email = $request->input('email');
        $etudiant->date_naissance = $request->input('date_naissance');
        $etudiant->ville_id = $request->input('ville_id');
        $etudiant->save();
        return redirect()->route('etudiants.index')->with('success', 'Etudiant créé avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etudiant = Etudiant::find($id);
        return view('etudiants.show', ['etudiant' => $etudiant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etudiant = Etudiant::find($id);
        $villes = Ville::all();
        return view('etudiants.edit', [
            'etudiant' => $etudiant,
            'villes' => $villes

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $etudiant = Etudiant::find($id);
        $etudiant->name = $request->input('name');
        $etudiant->adresse = $request->input('adresse');
        $etudiant->phone = $request->input('phone');
        $etudiant->email = $request->input('email');
        $etudiant->date_naissance = $request->input('date_naissance');
        $etudiant->ville_id = $request->input('ville_id');
        $etudiant->save();
        return redirect()->route('etudiants.show',$id )->with('success', 'Etudiant mis à jour');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();
        return redirect()->route('etudiants.index')->with('success', 'Etudiant supprimé avec succès');
    }
}