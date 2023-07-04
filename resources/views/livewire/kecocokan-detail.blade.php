<td class="px-6 py-2 text-center ">
    @if ($value)
        <div class="group">
            <div>
                @if ($type_data == 'angka')
                    @if ($value_type==2 || $value_type==5)
                        <div>{{ $value_display }}<div>
                        <div>{{ $value_display2 }}</div>
                    @else
                        <div>
                            {{ $value_display }}
                        </div>
                    @endif
                @elseif($type_data == 'pilihan')
                    @foreach ($value_display as $item)
                        <div>{{ $item }}</div>
                    @endforeach
                @else
                    <div>{{ $value_display }}</div>
                @endif
            </div>
            <div
                class=" transition-2 columns-2 justify-center items-center opacity-0 group-hover:opacity-100 flex mt-2">
                <div class="mr-2  text-white bg-orange-400 hover:bg-orange-300 px-2 py-1 border border-transparent rounded-md">
                    <x-tabler-edit wire:click="editKecocokan" />
                </div>
                <div class=" text-white bg-red-400 px-2 py-1 border border-transparent rounded-md hover:bg-red-300">
                    <x-tabler-trash wire:click="delete({{ $kecocokanLahan }})"/>
                </div>
            </div>
        </div>
    @else
        <div class="group text-red-500">
            Data kosong    
            <div class=" transition-2 columns-2 justify-center items-center opacity-0 group-hover:opacity-100 flex mt-2">
                <div class="mr-2 font-semibold text-white bg-green-400 hover:bg-green-300 px-2 py-1 border border-transparent rounded-md">
                        <a href="{{ route('kecocokans.create', [ 
                            'kriteria_id' => $kriteria_id,
                            'tanaman_id' => $tanaman_id,
                            'kecocokan' => $kecocokan,
                            ]) }}" class="btn btn-warning">Input Data</a>
                </div>
            </div>
        </div>
    @endif
</td>