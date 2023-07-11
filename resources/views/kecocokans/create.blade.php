<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sistem Penunjang Keputusan') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="py-4">
                        <form method="post" action="{{ route('kecocokans.store', ['tanaman' => $tanaman, 'kriteria' => $kriteria, 'kecocokan' => $kecocokan, 'type_data' => $type_data]) }}" class="mt-6 space-y-6">
                            @csrf
                            {{-- @livewire('kecocokan-create', ['tanaman'=>$tanaman, 'kriteria'=>$kriteria, 'value'=>$value]) --}}
                            <div class="mb-3">
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="mt-3">
                                        <x-input-label for="kelembapan" :value="__('Nama Tanaman')" />
                                        <x-text-input type="text"
                                            class="form-control is-invalid @enderror block mt-1 w-full" disabled
                                            value="{{ $tanaman->name }}" name="tanaman"/>
                                    </div>
                                    <div class="mt-3">
                                        <x-input-label for="kelembapan" :value="__('Nama Kriteria')" />
                                        <x-text-input type="text"
                                            class="form-control is-invalid @enderror block mt-1 w-full" disabled
                                            value="{{ $kriteria->name }}" name="kriteria"/>
                                    </div>
                                    <div class="mt-3">
                                        <x-input-label for="kelembapan" :value="__('Nilai Kecocokan')" />
                                        <x-text-input type="text"
                                            class="form-control is-invalid @enderror block mt-1 w-full" disabled
                                            value="{{ $kecocokan }}" name="kecocokan" id="kecocokan"/>
                                    </div>
                                    {{-- <div class="mt-3">
                                        <x-input-label for="kelembapan" :value="__('Bobot Kriteria')" />
                                        <x-text-input type="text"
                                            class="form-control is-invalid @enderror block mt-1 w-full" disabled
                                            value="{{ $kriteria->bobot }}" />
                                    </div> --}}
                                </div>
                            </div>
                            @if ($type_data=='angka')
                            @include('kecocokans.angka.kecocokan-angka')
                            @elseif ($type_data=='pilihan')
                            @include('kecocokans.pilihan.kecocokan-pilihan')
                            @endif
                            
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                <a href="{{ url()->previous() }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150'">Cancel</a>
                            
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sistem Penunjang Keputusan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="py-4">
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
                                <div>
                                    <div class="mb-3">
                                        <label for="type" class="form-label">Tipe Data</label>
                                        <select class="form-control m-bot15" onchange="this.">
                                            <option value="1">1 Rentang nilai</option>
                                            <option value="2">2 Rentang nilai</option>
                                            <option value="3">Nilai lebih kecil dari</option>
                                            <option value="4">Nilai lebih besar dari</option>
                                            <option value="5">Nilai lebih kecil dan lebih besar</option>
                                        </select>
                                    </div>
                                
                                    @switch($inputType)
                                    @case(1)
                                    <table class="table" border="1">
                                        <thead>
                                            <tr>
                                                <th colspan="3" class="text-center">Rentang Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" @error('inputDataMin1') is-invalid @enderror wire:model="inputDataMin1" wire:keyup="updateData"></td>
                                                <td>-</td>
                                                <td><input type="text" class="form-control" @error('inputDataMax1') is-invalid @enderror wire:model="inputDataMax1" wire:keyup="updateData"></td>
                                            </tr>
                                        </tbody>
                                    </table>                
                                    @break
                                    @case(2)
                                    <table class="table" border="1">
                                        <thead>
                                            <tr>
                                                <th colspan="3" class="text-center">Rentang Nilai 1</th>
                                                <th colspan="3" class="text-center">Rentang Nilai 2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" @error('inputDataMin1') is-invalid @enderror wire:model="inputDataMin1" wire:keyup="updateData"></td>
                                                <td>-</td>
                                                <td><input type="text" class="form-control" @error('inputDataMax1') is-invalid @enderror wire:model="inputDataMax1" wire:keyup="updateData"></td>
                                                <td><input type="text" class="form-control" @error('inputDataMin2') is-invalid @enderror wire:model="inputDataMin2" wire:keyup="updateData"></td>
                                                <td>-</td>
                                                <td><input type="text" class="form-control" @error('inputDataMax2') is-invalid @enderror wire:model="inputDataMax2" wire:keyup="updateData"></td>
                                            </tr>
                                        </tbody>
                                    </table>                
                                    @break
                                    @case(3)
                                    <div class="row">
                                        <div class="column mb-3">
                                            <label for="bobot" class="form-label">Nilai <</label>
                                            <input type="text" class="form-control" wire:model="inputDataMin1"  wire:keyup="updateData">
                                        </div>
                                    </div>
                                    @break
                                    @case(4)
                                    <div class="row">
                                        <div class="column mb-3">
                                            <label for="bobot" class="form-label">Nilai ></label>
                                            <input type="text" class="form-control" wire:model="inputDataMax1"  wire:keyup="updateData">
                                        </div>
                                    </div>
                                    @break
                                    @case(5)
                                    <table class="table" border="1">
                                        <thead>
                                            <tr>
                                                <th colspan="3" class="text-center">Nilai Lebih Kecil dari</th>
                                                <th colspan="3" class="text-center">Nilai Lebih Besar dari</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><</td>
                                                <td><input type="text" class="form-control" @error('inputDataMin1') is-invalid @enderror wire:model="inputDataMin1" wire:keyup="updateData"></td>
                                                <td> </td>
                                                <td> </td>
                                                <td>></td>
                                                <td><input type="text" class="form-control" @error('inputDataMax1') is-invalid @enderror wire:model="inputDataMax1" wire:keyup="updateData"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    @break
                                    @default
                                    <table class="table" border="1">
                                        <thead>
                                            <tr>
                                                <th colspan="3" class="text-center">Rentang Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" @error('inputDataMin1') is-invalid @enderror wire:model="inputDataMin1" wire:keyup="updateData"></td>
                                                <td>-</td>
                                                <td><input type="text" class="form-control" @error('inputDataMax1') is-invalid @enderror wire:model="inputDataMax1" wire:keyup="updateData"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    @endswitch
                                </div>
                            </div>
                            @endif
                            <div class="flex justify-center">
                                <button type="submit" class=" mr-3 rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Simpan</button>
                                <a href="{{ route('tanamans.edit', $tanaman->id) }}" class="rounded-md bg-gray-400 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}