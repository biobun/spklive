<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KecocokanLahan;
use App\Models\Kriteria;
use App\Models\Tanaman;

class KecocokanLahanController extends Controller
{
    //


    public function show($id)
    {
        $kecocokan = KecocokanLahan::find($id);
        return view('kecocokans.show', [
            'kecocokan' => $kecocokan
        ]);
    }

    public function edit(Request $request, $id)
    {
        $kecocokan = KecocokanLahan::find($id);
        return view('kecocokans.edit', [
            'kecocokan_id' => $kecocokan,
        ]);
    }

    public function create(Request $request)
    {
        
        $kriteria = Kriteria::find($request->kriteria_id);
        $tanaman = Tanaman::find($request->tanaman_id);
        return view('kecocokans.create', [
            'kriteria' => $kriteria,
            'tanaman' => $tanaman,
            'value' => $request->value,
        ]);
    }
}
