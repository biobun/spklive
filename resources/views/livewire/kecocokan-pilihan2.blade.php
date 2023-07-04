<div class="grid grid-cols-2 gap-6">
    {{-- Be like water. --}}
    <div class="grid grid-cols-1">
        Kedalaman Banjir
        @foreach ($datasItemNameSelected1 as $key => $item)
        <div>
            <input type="radio" wire:model="selected1" value="{{ $key }}" /> {{ $item['name'] }}
        </div>        
        {{-- @livewire('kecocokan-pilihan-radio', ['selection_id'=> $key, 'item' => $item['name'], 'selected' => $item['selected'], 'disable' => $item['disable']], key($key.$item['name'])) --}}
        @endforeach

    </div>
    <div class="grid grid-cols-1">
        Lamanya Banjir
        @foreach ($datasItemNameSelected2 as $key => $item)
        <div>
            <input type="radio" wire:model="selected2" value="{{ $key }}"/> {{ $item['name'] }}
        </div>
        @endforeach

    </div>
</div>