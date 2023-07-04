<?php

namespace App\Http\Livewire;

use Livewire\Component;

class KecocokanPilihanRadio extends Component
{

    public $item;
    public $selection_id;

    public $selected;
    public $disable;
    
    public function render()
    {
        return view('livewire.kecocokan-pilihan-radio');
    }
}
