<?php

namespace App\Http\Livewire;

use Livewire\Component;

class KecocokanAngka extends Component
{
    public $inputType;
    public $dataValue;
    // public $kecocokan;

    public $inputDataMin1 = 0;
    public $inputDataMax1 = 0;
    public $inputDataMin2 = 0;
    public $inputDataMax2 = 0;

    public function mount()
    {
        # code...
        // dd($this->inputType);
        $value_array = explode(';', $this->dataValue);
        // dd($value_array);
        $this->inputDataMin1 = $value_array[0];
        $this->inputDataMax1 = $value_array[1];
        $this->inputDataMin2 = $value_array[2];
        $this->inputDataMax2 = $value_array[3];
    }

    public function render()
    {
        return view('livewire.kecocokan-angka');
    }

    public function updateData()
    {
        # code...
        $this->dataValue = implode(';', [strval($this->inputDataMin1), strval($this->inputDataMax1), strval($this->inputDataMin2), strval($this->inputDataMax2)]);
        // dd($dataValue);
        $this->emit('updateData', $this->dataValue);
    }

    public function change()
    {
        $this->emit('updateDataType', $this->inputType);
    }
}
