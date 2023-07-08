<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="card">
        <div class="card-header">Input Data Kecocokan Lahan</div>
        <div class="card-body">
            <form wire:submit.prevent="store">
                <div class="grid grid-cols-4 gap-6">
                    <div class="mt-3">
                        <x-input-label for="kelembapan" :value="__('Nama Tanaman')" />
                        <x-text-input type="text"
                            class="form-control is-invalid @enderror block mt-1 w-full" disabled
                            value="{{ $tanaman->name }}" />
                    </div>
                    <div class="mt-3">
                        <x-input-label for="kelembapan" :value="__('Nama Kriteria')" />
                        <x-text-input type="text"
                            class="form-control is-invalid @enderror block mt-1 w-full" disabled
                            value="{{ $kriteria->name }}" />
                    </div>
                    <div class="mt-3">
                        <x-input-label for="kelembapan" :value="__('Nilai Kecocokan')" />
                        <x-text-input type="text"
                            class="form-control is-invalid @enderror block mt-1 w-full" disabled
                            value="{{ $kecocokan }}" />
                    </div>
                    <div class="mt-3">
                        <x-input-label for="kelembapan" :value="__('Bobot Kriteria')" />
                        <x-text-input type="text"
                            class="form-control is-invalid @enderror block mt-1 w-full" disabled
                            value="{{ $kriteria->bobot }}" />
                    </div>
                </div>
                
                <div class="py-6">
                    @if ($kriteria->type_data == 'angka')
                    @livewire('kecocokan-angka', ['dataValue'=>$dataValue, 'inputType'=>$inputAngkaType])
                    @elseif ($kriteria->type_data == 'pilihan')
                    @livewire('kecocokan-pilihan', ['dataValue'=>$dataValue, 'kriteria' => $kriteria, 'tanaman' => $tanaman])
                    @else
                    @livewire('kecocokan-pilihan2', ['dataValue'=>$dataValue, 'kriteria' => $kriteria, 'tanaman' => $tanaman])
                    @endif
                </div>
                <div class="flex justify-center">
                    <button type="submit" class=" mr-3 rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Simpan</button>
                    <a href="{{ route('tanamans.edit', $tanaman->id) }}" class="rounded-md bg-gray-400 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Batal</a>
                
                </div>
            </form>
        </div>
    </div>
</div>