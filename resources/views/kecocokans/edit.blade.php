<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Ubah Kriteria {{ $kriteria->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- <div class="py-4">
                        @livewire('kecocokan-edit', ['kecocokan_id'=>$kecocokan_id])
                    </div> --}}
                    <form method="post" action="{{ route('kecocokans.update', ['kecocokan' => $id]) }}">
                        @csrf
                        @method('patch')
                        {{-- @livewire('kecocokan-create', ['tanaman'=>$tanaman, 'kriteria'=>$kriteria, 'value'=>$value]) --}}
                        <div class="flex flex-col space-y-6">
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
                            @if ($type_data=='angka')
                            @include('kecocokans.angka.kecocokan-angka')
                            @elseif ($type_data=='pilihan')
                            @include('kecocokans.pilihan.kecocokan-pilihan')
                            @endif
                            
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                <a href="{{ url()->previous() }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150'">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>