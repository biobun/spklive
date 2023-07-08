<?php

namespace App\Http\Livewire;

use App\Constants\BanjirDalam;
use App\Constants\BanjirLama;
use App\Constants\Drainase;
use App\Constants\Tekstur;
use App\Models\KecocokanLahan;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Tanaman;
use App\Models\Kriteria;
use Illuminate\Support\Facades\Log;

class KecocokanCreate extends Component
{
    // public $name; 
    public $kriteria;
    public $tanaman;
    public $kecocokan;
    public $kecocokan_id = null;

    public $inputType; // Jenis input: Angka atau Pilihan
    public $inputAngkaType = 1; // Pilihan input angka : 2 rentang nilai, 1 rentang nilai,  1 nilai minimum, 1 nilai maximum
    public $typeData;

    public $dataValue = '0;0;0;0';

    protected $listeners = ['updateData', 'updateDataType'];




    public function mount(Request $request)
    {
        // dd($request);
        $this->kecocokan = $request->kecocokan;
        $inputType = $this->kriteria->type_data;
        if ($inputType == 'pilihan') {
            $kriteriaName = $this->kriteria->name;
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
            info(count($datas));
            $this->dataValue = '0;0;0;0;0;0;0;0';
        } else if ($inputType == 'pilihan2'){
            $kriteriaName = $this->kriteria->name;
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
            // $datas1 = BanjirDalam::getBanjirDalamConstant();
            // $datas2 = BanjirLama::getBanjirLamaConstant();
            // info(count($datas1));
            $this->dataValue = '0;0';
        }
        


    }

    public function render()
    {

        return view('livewire.kecocokan-create');
    }

    public function store()
    {
        KecocokanLahan::create([
            'tanaman_id' => $this->tanaman->id,
            'kriteria_id' => $this->kriteria->id,
            'kecocokan' => $this->kecocokan,
            'value' => $this->dataValue,
            'value_type' => $this->inputAngkaType,
        ]);
        return redirect()->to('/tanamans/'.$this->tanaman->id.'/edit');
    }

    public function updateData($dataValue)
    {
        // dd($dataValue);
        info($dataValue);
        $this->dataValue = $dataValue;

    }

    public function updateDataType($inputAngkaType)
    {
        $this->inputAngkaType = $inputAngkaType;

    }


}
