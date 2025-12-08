<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use App\Models\Region;
use App\Models\Langue;
use App\Models\Utilisateur;
use App\Models\TypeContenu;
use Illuminate\Http\Request;

class ContenuController extends Controller
{
    public function index()
    {
        $contenus = Contenu::with(['region','langue','auteur','type'])
                           ->paginate(10);

        return view('contenus.index', compact('contenus'));
    }

    public function create()
    {
        return view('contenus.create', [
            'regions' => Region::all(),
            'langues' => Langue::all(),
            'utilisateurs' => Utilisateur::all(),
            'types' => TypeContenu::all(),
            'contenus' => Contenu::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
    'titre' => 'required|string|max:70',
    'texte' => 'nullable|string|max:100',
    'date_creation' => 'required|date',
    'statut' => 'required|string|max:20',
    'parent_id' => 'nullable|integer|exists:contenus,id_contenu',
    'date_validation' => 'nullable|date',
    'id_region' => 'required|exists:regions,id_region',
    'id_langue' => 'required|exists:langues,id_langue',
    'id_moderateur' => 'required|exists:utilisateurs,id_utilisateur',
    'id_type_contenu' => 'required|exists:type_contenus,id_type_contenu',
    'id_auteur' => 'required|exists:utilisateurs,id_utilisateur'
]);
        Contenu::create($validated);

        return redirect()->route('contenus.index')
                         ->with('success','Contenu créé.');
    }

    public function edit($id)
    {
        $contenu = Contenu::findOrFail($id);

        return view('contenus.edit', [
            'contenu' => $contenu,
            'regions' => Region::all(),
            'langues' => Langue::all(),
            'utilisateurs' => Utilisateur::all(),
            'types' => TypeContenu::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $contenu = Contenu::findOrFail($id);

        $request->validate([
            'titre' => 'required|string|max:70',
            'texte' => 'nullable|string|max:100',
            'datecreation' => 'required|date',
            'statut' => 'required|string|max:20',
            'parentid' => 'nullable|integer|exists:contenus,id_contenu',
            'datevalidation' => 'nullable|date',
            'idregion' => 'required|exists:regions,id_region',
            'idlangue' => 'required|exists:langues,id_langue',
            'idmoderateur' => 'required|exists:utilisateurs,id_utilisateur',
            'idtypecontenu' => 'required|exists:type_contenus,id_type_contenu',
            'idauteur' => 'required|exists:utilisateurs,id_utilisateur'
        ]);

        $contenu->update($request->all());

        return redirect()->route('contenus.index')
                         ->with('success','Contenu modifié.');
    }

    public function destroy($id)
    {
        Contenu::findOrFail($id)->delete();
        return redirect()->route('contenus.index')
                         ->with('success','Contenu supprimé.');
    }
    public function show($id)
{
    $contenu = Contenu::with(['region','langue','auteur','medias','commentaires'])
                      ->findOrFail($id);
    return view('contenus.show', compact('contenu'));
}

}
