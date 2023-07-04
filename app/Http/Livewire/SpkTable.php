<?php

namespace App\Http\Livewire;

use App\Models\inputData;
use Livewire\Component;

class SpkTable extends Component
{

    public $datas;
    public $create_at;


    public function render()
    {
        $data = inputData::orderBy('id')->get();
        // dd($data);
        // return view('livewire.spk-table');
        return view('livewire.spk-table',[
            'spks' => inputData::orderBy('id')->get()
        ]);
    }

    // public function mount()
    // {
    //     $this->datas = inputData::all();

    // }

    public function delete($id)
    {
        # code...
        // dd($id);
        $user = inputData::find($id);
        // dd($user);
        $user->delete();
        // session()->flash('success', 'User Berhasil Dihapus');
    }
}

