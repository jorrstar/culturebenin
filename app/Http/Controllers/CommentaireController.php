<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Contenu;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function index()
    {
        $commentaires = Commentaire::with(['contenu','utilisateur'])->paginate(10);
        return view('commentaires.index', compact('commentaires'));
    }

    public function create()
    {
        return view('commentaires.create', [
            'contenus' => Contenu::all(),
            'utilisateurs' => Utilisateur::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'texte' => 'required|string',
            'note' => 'required|integer|min:0|max:20',
            'date' => 'required|date',
            'id_contenu' => 'required|exists:contenus,id_contenu',
            'id_utilisateur' => 'required|exists:utilisateurs,id_utilisateur'
        ]);

        Commentaire::create($request->all());
        return redirect()->route('commentaires.index')->with('success', 'Commentaire ajouté.');
    }

    public function show($id)
    {
        $commentaire = Commentaire::with(['contenu','utilisateur'])->findOrFail($id);
        return view('commentaires.show', compact('commentaire'));
    }

    public function edit($id)
    {
        $commentaire = Commentaire::findOrFail($id);

        return view('commentaires.edit', [
            'commentaire' => $commentaire,
            'contenus' => Contenu::all(),
            'utilisateurs' => Utilisateur::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'texte' => 'required|string',
            'note' => 'required|integer|min:0|max:20',
            'date' => 'required|date',
            'id_contenu' => 'required|exists:contenus,id_contenu',
            'id_utilisateur' => 'required|exists:utilisateurs,id_utilisateur'
        ]);

        $commentaire = Commentaire::findOrFail($id);
        $commentaire->update($request->all());

        return redirect()->route('commentaires.index')->with('success', 'Commentaire modifié.');
    }

    public function destroy($id)
    {
        Commentaire::findOrFail($id)->delete();
        return redirect()->route('commentaires.index')->with('success', 'Commentaire supprimé.');
    }
}
