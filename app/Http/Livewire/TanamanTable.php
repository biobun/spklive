<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tanaman;

class TanamanTable extends Component
{
    protected $listeners = ['TanamanStore' => 'render'];

    public function render()
    {
        // info('render tanaman tabel');
        return view('livewire.tanaman-table',[
            'tanamans' => Tanaman::orderBy('id', 'desc')->get()
        ]);
    }
    public function delete($id)
    {
        # code...
        // dd($id);
        $user = Tanaman::find($id);
        $user->delete();
        session()->flash('success', 'User Berhasil Dihapus');
    }
}
