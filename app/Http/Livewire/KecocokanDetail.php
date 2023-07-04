<?php

namespace App\Http\Livewire;

use App\Constants\Drainase;
use App\Models\KecocokanLahan;
use Livewire\Component;
use App\Constants\Tekstur;
use App\Models\Kriteria;

class KecocokanDetail extends Component
{
    public $kecocokan;
    public $kriteria_id;
    public $tanaman_id;

    public $value; // Nilai database
    public $type_data; // Jenis data : Pilihan atau angka
    public $value_type; // Jenis data angka : 1 atau 2 rentang, min, max

    public $value_display = 'test';
    public $value_display2 = 'test';

    public $outputDataMin1 = 0;
    public $outputDataMax1 = 0;
    public $outputDataMin2 = 0;
    public $outputDataMax2 = 0;

    public $kecocokanLahan;

    protected $listeners = ['pilihanUpdate' => 'render'];

    public function mount()
    {
        # code...
        // info($this->kriteria);
        // info('mount kecocokan detail');
        $kecocokanLahan = KecocokanLahan::where('tanaman_id',$this->tanaman_id)->where('kriteria_id',$this->kriteria_id)->where('kecocokan',$this->kecocokan)->first();
        if ($kecocokanLahan) {
            # code...
            $this->kecocokanLahan = $kecocokanLahan;
            $this->value = $kecocokanLahan->value;
            $kriteria = $kecocokanLahan->kriteria;
            $this->type_data = $kriteria->type_data;
            $lambang_satuan = '';
            if ($this->type_data=='angka') {
                # code...
                $this->value_type = $kecocokanLahan->value_type;
                $value_array = explode(';', $this->value);
                // dd($value_array);
                $this->outputDataMin1 = $value_array[0];
                $this->outputDataMax1 = $value_array[1];
                $this->outputDataMin2 = $value_array[2];
                $this->outputDataMax2 = $value_array[3];
                switch ($this->value_type) {
                    case 1:
                        # code...
                        $this->value_display = $this->outputDataMin1.' - '.$this->outputDataMax1.$lambang_satuan;
                        break;
                    case 2:
                        # code...
                        $this->value_display = $this->outputDataMin1.' - '.$this->outputDataMax1.$lambang_satuan;
                        $this->value_display2 = $this->outputDataMin2.' - '.$this->outputDataMax2.$lambang_satuan;
                        break;
                    case 3:
                        # code...
                        $this->value_display = '< '.$this->outputDataMin1.$lambang_satuan;
                        break;
                    case 4:
                        # code...
                        $this->value_display = '> '.$this->outputDataMax1.$lambang_satuan;
                        break;
                    case 5:
                        # code...
                        $this->value_display = '< '.$this->outputDataMin1.$lambang_satuan;
                        $this->value_display2 = '> '.$this->outputDataMax1.$lambang_satuan;
                        break;
                    default:
                        # code...
                        break;
                }
            } else if ($this->type_data=='pilihan'){
                $kriteriaName = $kriteria->name;
                switch ($kriteriaName) {
                    case 'Drainase':
                        # code...
                        $datas = Drainase::getDrainaseConstant();
                        break;
                    case 'Tekstur':
                        # code...
                        $datas = Tekstur::getTeksturConstant();
                        break;
                }
                $value_array = explode(';', $this->value);
                $value_display = [];
                for ($i=0; $i < count($value_array); $i++) {
                    $selected = $value_array[$i];
                    if ($selected) {
                        // if($value_display){
                        //     $value_display = $value_display.', ';
                        // }
                        // $value_display = $value_display.$datas[$i];
                        array_push($value_display, $datas[$i]);
                    }
                }
                $this->value_display = $value_display;
            } else {
                $kriteriaName = $kriteria->name;
                $value_array = explode(';', $this->value);
                if ($value_array == ['0','0']) {
                    $this->value_display = 'F0';
                } else {
                    $this->value_display = 'F'.implode('', $value_array);
                }
                
            }
        }
    }

    public function delete($id)
    {
        # code...
        // dd($id);
        $kecocokan_id = KecocokanLahan::find($id)->first();
        // dd($kecocokan_id);
        $kecocokan_id->delete();
        $this->value = null;
        $this->mount();

        $this->emit('deleteKecocokan');
    }

    
    public function render()
    {
        // dd($this->kriteria);
        // info('render kecocokan detail');
        return view('livewire.kecocokan-detail');
    }

    public function editKecocokan()
    {
        # code...
        redirect(route('kecocokans.edit', [
            'id' => $this->kecocokanLahan->id,
        ]));
    }
}
