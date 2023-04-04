<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use JetBrains\PhpStorm\Language;
use Illuminate\Support\Facades\Auth;
class DocumentController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $documents = Document::where('user_id', Auth::id())->paginate(2);
        return view('documents.index', compact('documents'));
    }
  public function forumDoc(Request $request)
     {
         $documents = Document::select()->paginate(2);
         return view('documents.forumDoc', compact('documents'));
     }
    /**
     * Show the form for creating a new resource.

     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title_fr' => 'required',
            'title_en' => 'required',
            'date' => 'required|date',
            'file' => 'required|mimes:pdf,doc,docx,zip|max:2048'
        ]);
        $document = new Document();
        $document->title_fr = $validatedData['title_fr'];
        $document->title_en = $validatedData['title_en'];
        $document->date = $validatedData['date'];


        $fileName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('uploads/documents'), $fileName);

        $document->file = $fileName;
        $document->user_id = Auth::User()->id;

        $document->save();

        return redirect()->route('documents.index')->with('success', 'Document créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Document::find($id);
        return view('documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = Document::findOrFail($id);
        return view('documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Récupérer le document existant
        $document = Document::findOrFail($id);

        // Valider les données du formulaire
        $validatedData = $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        // Mettre à jour les champs du document
        $document->title_fr = $validatedData['title_fr'];
        $document->title_en = $validatedData['title_en'];
        $document->date = $validatedData['date'];

        // Sauvegarder les modifications dans la base de données
        $document->save();

        // Rediriger l'utilisateur vers la page du document modifié
        return redirect()->route('documents.show', $document->id)
            ->with('success', 'Le document a été mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Document::find($id);

        if ($document) {
            $document->delete();
            return redirect()->route('documents.index')->with('success', 'Le document a été supprimé avec succès.');
        }

        return redirect()->route('documents.index')->with('error', 'Impossible de supprimer le document.');
    }
}
