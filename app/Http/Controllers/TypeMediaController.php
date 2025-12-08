<?php

namespace App\Http\Controllers;

use App\Models\TypeMedia;
use Illuminate\Http\Request;

class TypeMediaController extends Controller
{
    public function index()
    {
        $types = TypeMedia::paginate(10);
        return view('typemedias.index', compact('types'));
    }

    public function create()
    {
        return view('typemedias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_media' => 'required|string|max:100'
        ]);

        TypeMedia::create($request->all());
        return redirect()->route('typemedias.index')->with('success', 'Type média créé.');
    }

    public function show($id)
    {
        $type = TypeMedia::findOrFail($id);
        return view('typemedias.show', compact('type'));
    }

    public function edit($id)
    {
        $type = TypeMedia::findOrFail($id);
        return view('typemedias.edit', compact('type'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_media' => 'required|string|max:100'
        ]);

        $type = TypeMedia::findOrFail($id);
        $type->update($request->all());

        return redirect()->route('typemedias.index')->with('success', 'Type média modifié.');
    }

    public function destroy($id)
    {
        TypeMedia::findOrFail($id)->delete();
        return redirect()->route('typemedias.index')->with('success', 'Type média supprimé.');
    }
}
