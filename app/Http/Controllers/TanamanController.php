<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanaman;

class TanamanController extends Controller
{
    //
    public function show($id)
    {
        $tanaman = Tanaman::find($id);
        return view('tanamans.show', [
            'tanaman' => $tanaman
        ]);
    }

    public function edit($id)
    {
        $tanaman = Tanaman::find($id);
        return view('tanamans.edit', [
            'tanaman' => $tanaman
        ]);
    }
}
