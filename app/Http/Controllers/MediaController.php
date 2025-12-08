<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Contenu;
use App\Models\TypeMedia;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        $medias = Media::with(['contenu','typeMedia'])->paginate(10);
        return view('medias.index', compact('medias'));
    }

    public function create()
    {
        return view('medias.create', [
            'contenus' => Contenu::all(),
            'types' => TypeMedia::all()
        ]);
    }

public function store(Request $request)
{
    $request->validate([
        'chemin' => 'required|file',
        'description' => 'nullable|string',
        'id_contenu' => 'required|exists:contenus,id_contenu',
        'id_type_media' => 'required|exists:type_medias,id_type_media'
    ]);

    // Sauvegarde du fichier dans /storage/app/public/medias
    $path = $request->file('chemin')->store('medias', 'public');

    Media::create([
        'chemin' => $path, // ex: medias/image.jpg
        'description' => $request->description,
        'id_contenu' => $request->id_contenu,
        'id_type_media' => $request->id_type_media,
    ]);

    return redirect()->route('medias.index')->with('success', 'Média créé.');
}


    public function show($id)
    {
        $media = Media::with(['contenu','typeMedia'])->findOrFail($id);
        return view('medias.show', compact('media'));
    }

    public function edit($id)
    {
        $media = Media::findOrFail($id);
        return view('medias.edit', [
            'media' => $media,
            'contenus' => Contenu::all(),
            'types' => TypeMedia::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'chemin' => 'required|string|max:255',
            'description' => 'nullable|string',
            'id_contenu' => 'required|exists:contenus,id_contenu',
            'id_type_media' => 'required|exists:type_medias,id_type_media'
        ]);

        $media = Media::findOrFail($id);
        $media->update($request->all());

        return redirect()->route('medias.index')->with('success', 'Média modifié.');
    }

    public function destroy($id)
    {
        Media::findOrFail($id)->delete();
        return redirect()->route('medias.index')->with('success', 'Média supprimé.');
    }
}
