<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tanaman;
use Illuminate\Support\Facades\Redirect;

class TanamanCreate extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.Tanaman-create');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string',
        ]);

        Tanaman::create([
            'name' => $this->name,
        ]);

        $this->name = NULL;
        
        session()->flash('success', 'Tanaman Berhasil Dibuat');

        $this->emit('TanamanStore');

        return Redirect::to('/tanamans');
        // return back();
    }
}
