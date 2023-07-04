<div>
    {{-- Be like water. --}}
    @foreach ($datasItemNameSelected as $key => $item)
    @livewire('kecocokan-pilihan-line', ['selection_id'=> $key, 'item' => $item['name'], 'selected' => $item['selected'], 'disable' => $item['disable']], key($key.$item['name']))
    @endforeach
</div>