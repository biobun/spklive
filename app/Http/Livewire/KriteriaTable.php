<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kriteria;

class KriteriaTable extends Component
{
    // protected $listeners = ['KriteriaBobot' => 'mount'];

    // public $name;
    // public $bobot;
    // public $kriteria_id;
    public $total_bobot = 0;
    public $kriteria_datas;

    public function mount()
    {
        # code...
        $kriterias = Kriteria::orderBy('id', 'asc')->get();
        $this->total_bobot = 0;
        foreach ($kriterias as $kriteria) {
            $this->total_bobot += $kriteria->bobot;
            $this->kriteria_datas[$kriteria->id] = [
                'id' => $kriteria->id,
                'name' => $kriteria->name,
                'bobot' => $kriteria->bobot
            ];
            // $this->kriteria_datas[$kriteria->id] = [
            //     'name' => $kriteria->name,
            //     'bobot' => $kriteria->bobot
            // ];            
            # code...
        }
        // dd($this->kriteria_datas);
        // $this->kriteria_id = $kriteria->id;
        // $this->name = $kriteria->name;
        // $this->bobot = $kriteria->bobot;
        // dd($this);
    }

    public function add($kriteria_id)
    {
        // dd($kriteria_id);
        # code...
        // Kriteria::where('id',$kriteria_id)->update([
        //     'bobot' => $bobot+1,
        // ]);
        $this->kriteria_datas[$kriteria_id]['bobot']++;
        $this->total_bobot = 0;
        foreach ($this->kriteria_datas as $kriteria) {
            $this->total_bobot += $kriteria['bobot'];    
        }
        $this->emit('KriteriaBobot');
    }

    public function sub($kriteria_id)
    {
        // dd($kriteria_id);
        # code...
        // Kriteria::where('id',$kriteria_id)->update([
        //     'bobot' => $bobot-1,
        // ]);
        $this->kriteria_datas[$kriteria_id]['bobot']--;
        $this->total_bobot = 0;
        foreach ($this->kriteria_datas as $kriteria) {
            $this->total_bobot += $kriteria['bobot'];    
        }
        $this->emit('KriteriaBobot');

    }

    public function render()
    {
        return view('livewire.kriteria-table',[
            'kriterias' => $this->kriteria_datas
        ]);
    }
    public function delete($id)
    {
        # code...
        $user = Kriteria::find($id);
        $user->delete();
        session()->flash('success', 'User Berhasil Dihapus');
    }
}
