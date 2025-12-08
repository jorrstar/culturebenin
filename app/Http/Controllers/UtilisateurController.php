<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Role;
use App\Models\Langue;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function index()
    {
        $utilisateurs = Utilisateur::with(['role','langue'])->paginate(10);
        return view('utilisateurs.index', compact('utilisateurs'));
    }

    public function create()
    {
        $roles = Role::all();
        $langues = Langue::all();
        return view('utilisateurs.create', compact('roles','langues'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:20',
            'email' => 'required|email|max:30|unique:utilisateurs,email',
            'mot_de_passe' => 'required|string|max:255',
            'prenom' => 'required|string|max:10',
            'sexe' => 'required|string|max:1',
            'date_inscription' => 'required|date',
            'date_naissance' => 'required|date',
            'statut' => 'required|string|max:10',
            'photo' => 'required|string|max:255',
            'id_role' => 'nullable|exists:roles,id_role',
            'id_langue' => 'nullable|exists:langues,id_langue',
        ]);
 if ($request->id_role == 1 && !auth()->user()->isAdmin()) {
        abort(403, 'Seul un admin peut créer un administrateur.');
    }
        Utilisateur::create($request->all());
        return redirect()->route('utilisateurs.index')->with('success','Utilisateur créé.');
    }

    public function show($id)
    {
        $utilisateur = Utilisateur::with(['role','langue'])->findOrFail($id);
        return view('utilisateurs.show', compact('utilisateur'));
    }

    public function edit($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        $roles = Role::all();
        $langues = Langue::all();
        return view('utilisateurs.edit', compact('utilisateur','roles','langues'));
    }

    public function update(Request $request, $id)
    {
        $utilisateur = Utilisateur::findOrFail($id);

        $request->validate([
            'nom' => 'required|string|max:20',
            'email' => 'required|email|max:30|unique:utilisateurs,email,'.$id.',id_utilisateur',
            'mot_de_passe' => 'required|string|max:255',
            'prenom' => 'required|string|max:10',
            'sexe' => 'required|string|max:1',
            'date_inscription' => 'required|date',
            'date_naissance' => 'required|date',
            'statut' => 'required|string|max:10',
            'photo' => 'required|string|max:255',
            'id_role' => 'nullable|exists:roles,id_role',
            'id_langue' => 'nullable|exists:langues,id_langue',
        ]);

        $utilisateur->update($request->all());
        return redirect()->route('utilisateurs.index')->with('success','Utilisateur modifié.');
    }

    public function destroy($id)
    {
        Utilisateur::findOrFail($id)->delete();
        return redirect()->route('utilisateurs.index')->with('success','Utilisateur supprimé.');
    }
}
