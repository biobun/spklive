<?php

namespace App\Http\Livewire;

use App\Models\Kriteria;
use Livewire\Component;
use App\Models\Tanaman;

class TanamanEdit extends Component
{
    public $name;
    public $tanaman_id;
    public $kecocokanLahanDatas;
    public $tanaman;

    protected $listeners = ['deleteKecocokan'=>'deleteKecocokan'];
    

    public function mount($tanaman)
    {
        # code...
        // dd($tanaman);
        info('mount tanaman edit');
        $this->tanaman_id = $tanaman->id;
        $this->name = $tanaman->name;
        // dd($tanaman->kecocokans);
        $kecocokanLahans = $tanaman->kecocokans;
        $kecocokanLahanDatas = [];
        foreach ($kecocokanLahans as $kecocokanLahan) {
            # code...
            $kriteria_id = $kecocokanLahan->kriteria_id;
            $kecocokan = $kecocokanLahan->kecocokan;
            $value = $kecocokanLahan->value;
            // $key = join('',['K',strval($kriteria_id),'C',strval($kecocokan)]);
            // $kecocokanLahanDatas[$key] = $value;
            $kecocokanLahanDatas[$kriteria_id] = [$kecocokan => $value];
        }
        // dd($kecocokanLahanDatas);
        // info($kecocokanLahanDatas);
        // info(array_key_exists('K1C3',$kecocokanLahanDatas));
        $this->kecocokanLahanDatas = $kecocokanLahanDatas;
    }

    public function update()
    {
        # code...
        $this->validate([
            'name' => 'required|string',
        ]);

        Tanaman::where('id',$this->tanaman_id)->update([
            'name' => $this->name,
        ]);
        
        redirect()->route('tanamans.home')->with('success','tanaman berhasil diupdate');
    }

    public function render()
    {
        info('render tanaman edit');
        return view('livewire.tanaman-edit',[
            'kriterias' => Kriteria::orderBy('id', 'asc')->get(),
            'tanaman_id' => $this->tanaman_id,
        ]);
    }

    public function deleteKecocokan()
    {
        # code...
        info('kecocokan delete');

        $this->mount($this->tanaman);
        $this->render();
    }
}
