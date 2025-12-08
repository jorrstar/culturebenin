<?php

namespace App\Http\Controllers;

use App\Models\Langue;
use Illuminate\Http\Request;

class LangueController extends Controller
{
    public function index()
    {
        $langues = Langue::paginate(10);
        return view('langues.index', compact('langues'));
    }

    public function create()
    {
        return view('langues.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_langue' => 'required|string|max:100',
            'code_langue' => 'required|string|max:10',
            'description' => 'nullable|string'
        ]);

        Langue::create($request->all());
        return redirect()->route('langues.index')->with('success', 'Langue créée.');
    }

    public function show($id)
    {
        $langue = Langue::findOrFail($id);
        return view('langues.show', compact('langue'));
    }

    public function edit($id)
    {
        $langue = Langue::findOrFail($id);
        return view('langues.edit', compact('langue'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_langue' => 'required|string|max:100',
            'code_langue' => 'required|string|max:10',
            'description' => 'nullable|string'
        ]);

        $langue = Langue::findOrFail($id);
        $langue->update($request->all());

        return redirect()->route('langues.index')->with('success', 'Langue mise à jour.');
    }

    public function destroy($id)
    {
        Langue::findOrFail($id)->delete();
        return redirect()->route('langues.index')->with('success', 'Langue supprimée.');
    }
}
