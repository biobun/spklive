<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sistem Penunjang Keputusan') }}
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
                    <form method="post" action="{{ route('kecocokans.update', ['kecocokan' => $id]) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')
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
                            {{-- <x-secondary-button>{{ __('Cancel') }}</x-secondary-button> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>