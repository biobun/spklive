<?php

namespace App\Http\Livewire;

use App\Models\KecocokanLahan;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Tanaman;
use App\Models\Kriteria;
use Illuminate\Support\Facades\Log;

class KecocokanEdit extends Component
{
    // public $name; 
    public $kecocokan_id;
    public $kriteria;
    public $tanaman;
    public $kecocokan;

    public $inputType; // Jenis input: Angka atau Pilihan
    public $inputAngkaType = 1; // Pilihan input angka : 2 rentang nilai, 1 rentang nilai,  1 nilai minimum, 1 nilai maximum
    public $typeData;

    public $dataValue = '0;0;0;0';


    protected $listeners = ['updateData', 'updateDataType'];


    public function mount(Request $request)
    {
        $this->tanaman = $this->kecocokan_id->tanaman;
        $this->kriteria = $this->kecocokan_id->kriteria;
        $this->kecocokan = $this->kecocokan_id->kecocokan;
        $this->dataValue = $this->kecocokan_id->value;
        $this->inputAngkaType = $this->kecocokan_id->value_type;
    }

    public function render()
    {

        return view('livewire.kecocokan-edit');
    }

    public function update()
    {
        # code...
        $this->kecocokan_id->update([
            'value' => $this->dataValue,
            'value_type' => $this->inputAngkaType,
        ]);

        return redirect()->to('/tanamans/'.$this->tanaman->id.'/edit');
    }

    public function store()
    {

        // Log::info('store');
        KecocokanLahan::create([
            'tanaman_id' => $this->tanaman->id,
            'kriteria_id' => $this->kriteria->id,
            'kecocokan' => $this->kecocokan,
            'value' => $this->dataValue,
            'value_type' => $this->inputAngkaType,
        ]);
        // return back();
        return redirect()->to('/tanamans/'.$this->tanaman->id.'/edit');
        // redirect()->route('tanamans.home')->with('success', 'tanaman berhasil diupdate');

        // $this->emitUp('pilihanUpdate');
    }

    public function updateData($dataValue)
    {
        // dd($dataValue);
        // info($dataValue);
        $this->dataValue = $dataValue;

    }

    public function updateDataType($inputAngkaType)
    {
        $this->inputAngkaType = $inputAngkaType;

    }
}
