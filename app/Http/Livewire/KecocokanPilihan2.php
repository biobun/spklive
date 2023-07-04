<?php

namespace App\Http\Livewire;

use App\Constants\BanjirDalam;
use App\Constants\BanjirDurasi;
use App\Constants\BanjirLama;
use App\Constants\Drainase;
use Livewire\Component;
use App\Constants\Tekstur;
use App\Models\KecocokanLahan;

class KecocokanPilihan2 extends Component
{

    public $kriteria;
    public $tanaman;
    public $kecocokan_id;
    public $dataValue;

    public $datas;
    public $datasSelected;
    public $datasItemNameSelected1;
    public $datasItemNameSelected2;

    public $datas1;
    public $datas2;

    public $selected1;
    public $selected2;

    

    protected $listeners = ['updateDataPilihan', 'deleteKecocokan'=>'mount'];

    public function render()
    {
        info('render pilihan');
        return view('livewire.kecocokan-pilihan2');
    }

    public function mount()
    {
        info('mount pilihan ');
        // dd($this->kecocokan_id);
        // dd($this->tanaman);
        // dd($this->kriteria);
        $this->datas1 = BanjirDalam::getBanjirDalamConstant();
        $this->datas2 = BanjirLama::getBanjirLamaConstant();
        $this->datasSelected = explode(';',$this->dataValue);
        $selectedValue = $this->datasSelected[0];
        $this->selected1 = $selectedValue;
        foreach ($this->datas1 as $key => $value) {
            $array_value = ['name' => $value];
            $this->datasItemNameSelected1[$key] = $array_value;
        }
        $this->selected2 = $this->datasSelected[1];
        foreach ($this->datas2 as $key => $value) {
            $array_value = ['name' => $value];
            $this->datasItemNameSelected2[$key] = $array_value;
        }
    }

    public function updateDataPilihan()
    {
        $this->dataValue = implode(';', [$this->selected1,$this->selected2]);
        // info($this->dataValue);
        $this->emitUp('updateData', $this->dataValue);
    }

    public function updatedSelected1()
    {
        info($this->selected1);
        $this->updateDataPilihan();
    }

    public function updatedSelected2()
    {
        info($this->selected2);
        $this->updateDataPilihan();
    }

}
