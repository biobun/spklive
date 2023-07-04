<?php

namespace App\Http\Livewire;

use Livewire\Component;

class KecocokanPilihanLine extends Component
{
    public $item;
    public $selection_id;

    public $selected;
    public $disable;

    protected $listeners = ['deleteKecocokan'=>'mount'];



    public function mount()
    {
        // info($this->selection_id.' '.$this->item.': '.$this->selected);

    }
    
    public function render()
    {
        return view('livewire.kecocokan-pilihan-line');
    }

    public function updatedSelected()
    {
        # code...
        // info($this->selection_id.' '.$this->item.': '.$this->selected ? 1: 0 );
        $this->emit('updateDataPilihan', $this->selection_id, $this->selected);
    }
}
