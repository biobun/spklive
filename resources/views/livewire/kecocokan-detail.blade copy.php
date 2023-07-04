<div>
    {{-- @push('styles')
    <style>
        
    </style>
    @endpush --}}
    @if ($value)
    <td class="px-6 py-4">
        <div class="parent">
            @if ($type_data == 'angka')
                @if ($value_type==2 || $value_type==5)
                    <div>{{ $value_display }}<div>
                    <div>{{ $value_display2 }}</div>
                @else
                <div>
                    {{ $value_display }}
                </div>
                    
                @endif
            @else
                @foreach ($value_display as $item)
                    <div>{{ $item }}</div>
                @endforeach
            @endif
        </div>
        <div class="child bg-white row" id="DivToShow">
            <div class="column">
                {{-- <x-tabler-edit wire:click="editKecocokan({{ $kecocokanLahan->id }})" class="hidden-button" /> --}}
                    <x-tabler-edit wire:click="editKecocokan"/>
            </div>
            <div class="column">
                <x-tabler-trash wire:click="delete({{ $kecocokanLahan }})"/>
            </div>           
        </div>
    </td>
    @else
    <td class="text-center">
        <a href="{{ route('kecocokans.create', [ 
        'kriteria_id' => $kriteria_id,
        'tanaman_id' => $tanaman_id,
        'kecocokan' => $kecocokan,
        ]) }}" class="btn btn-warning">Input</a>
    </td>
    @endif

</div>