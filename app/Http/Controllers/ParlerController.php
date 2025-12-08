<?php

namespace App\Http\Controllers;

use App\Models\Langue;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParlerController extends Controller
{
    public function index()
    {
        $parlers = DB::table('parler')
            ->join('regions', 'parler.id_region', '=', 'regions.id_region')
            ->join('langues', 'parler.id_langue', '=', 'langues.id_langue')
            ->select('parler.*', 'regions.nom_region', 'langues.nom_langue')
            ->paginate(10);

        return view('parler.index', compact('parlers'));
    }

    public function create()
    {
        return view('parler.create', [
            'regions' => Region::all(),
            'langues' => Langue::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_region' => 'required|exists:regions,id_region',
            'id_langue' => 'required|exists:langues,id_langue'
        ]);

        DB::table('parler')->insert([
            'id_region' => $request->id_region,
            'id_langue' => $request->id_langue,
        ]);

        return redirect()->route('parler.index')->with('success', 'Association ajoutée.');
    }

    public function destroy($id_region, $id_langue)
    {
        DB::table('parler')
            ->where('id_region', $id_region)
            ->where('id_langue', $id_langue)
            ->delete();

        return redirect()->route('parler.index')->with('success', 'Association supprimée.');
    }
}
