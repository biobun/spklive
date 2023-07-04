<?php

namespace App\Http\Livewire;

use App\Constants\BanjirDalam;
use App\Constants\BanjirDurasi;
use App\Constants\Drainase;
use Livewire\Component;
use App\Constants\Tekstur;
use App\Models\KecocokanLahan;

class KecocokanPilihan extends Component
{

    public $kriteria;
    public $tanaman;
    public $kecocokan_id;
    public $dataValue;

    public $datas;
    public $datasSelected;
    public $datasItemNameSelected;

    public $datas1;
    public $datas2;

    

    protected $listeners = ['updateDataPilihan', 'deleteKecocokan'=>'mount'];

    public function render()
    {
        info('render pilihan');
        return view('livewire.kecocokan-pilihan');
    }

    public function mount()
    {
        info('mount pilihan ');
        // dd($this->kecocokan_id);
        // dd($this->tanaman);
        // dd($this->kriteria);
        $kriteriaName = $this->kriteria->name;
        switch ($kriteriaName) {
            case 'Drainase':
                # code...
                $this->datas = Drainase::getDrainaseConstant();
                break;
            case 'Tekstur':
                # code...
                $this->datas = Tekstur::getTeksturConstant();
                break;
                
        }
        // dd($datas);
        $optionAvailable = array_fill(0, count($this->datas), 0);
        if($this->kecocokan_id){            
            $kecocokanLahanAvailable = KecocokanLahan::where('tanaman_id',$this->tanaman->id)->where('kriteria_id',$this->kriteria->id)->where('id','!=',$this->kecocokan_id->id)->get();
            
        } else {
            $kecocokanLahanAvailable = KecocokanLahan::where('tanaman_id',$this->tanaman->id)->where('kriteria_id',$this->kriteria->id)->get();
        }
        info($kecocokanLahanAvailable);
        foreach ($kecocokanLahanAvailable as $kecocokanLahan) {
            $dataValue = $kecocokanLahan->value;
            $dataValueArray = explode(';', $dataValue);
            foreach ($dataValueArray as $index => $value) {
                # code...
                // info('avail kecocokan data '.$index.' '.$value );
                if($value){
                    // info($value);
                    $optionAvailable[$index] = $value;
                }
            }
        }    

        $this->datasSelected = explode(';',$this->dataValue);
        foreach ($this->datas as $key => $value) {
            // $this->datasSelected[$key] = 0;
            $selected = $this->datasSelected[$key] ? 1 : '';
            // info('key: '.$key);
            $array_value = ['name' => $value, 'selected' => $selected, 'disable' => $optionAvailable[$key]];
            $this->datasItemNameSelected[$key] = $array_value;
        }
    }

    public function updateDataPilihan($key, $selected)
    {
        info('pilihan '.$key.' '.$selected);
        $this->datasSelected[$key] = $selected ? 1 : 0;
        // info($this->datasSelected);
        $this->dataValue = implode(';', $this->datasSelected);
        // info($this->dataValue);
        $this->emitUp('updateData', $this->dataValue);
    }
}
