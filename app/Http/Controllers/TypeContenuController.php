<?php

namespace App\Http\Controllers;

use App\Models\TypeContenu;
use Illuminate\Http\Request;

class TypeContenuController extends Controller
{
    public function index()
    {
        $types = TypeContenu::paginate(10);
        return view('typecontenus.index', compact('types'));
    }

    public function create()
    {
        return view('typecontenus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_contenu' => 'required|string|max:100'
        ]);

        TypeContenu::create($request->all());
        return redirect()->route('typecontenus.index')->with('success','Type de contenu créé.');
    }

    public function show($id)
    {
        $type = TypeContenu::findOrFail($id);
        return view('typecontenus.show', compact('type'));
    }

    public function edit($id)
    {
        $type = TypeContenu::findOrFail($id);
        return view('typecontenus.edit', compact('type'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_contenu' => 'required|string|max:100'
        ]);

        $type = TypeContenu::findOrFail($id);
        $type->update($request->all());

        return redirect()->route('typecontenus.index')->with('success','Type de contenu modifié.');
    }

    public function destroy($id)
    {
        TypeContenu::findOrFail($id)->delete();
        return redirect()->route('typecontenus.index')->with('success','Type de contenu supprimé.');
    }
}
