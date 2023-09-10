<div>
    {{-- The best athlete wants his opponent at his best. --}}
    @include('my_components.alert-success')

    <form wire:submit.prevent="store" class="mt-6 space-y-12">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div >
                <div>
                    <x-input-label for="lahan" :value="__('Nama Lahan')" />
                    <x-text-input type="text" class="form-control @error('lahan') is-invalid @enderror block mt-1 w-full"
                        wire:model="lahan" />
                    <x-input-error class="mt-2" :messages="$errors->get('lahan')" />

                </div>
                <div class="mt-6">
                    <x-input-label for="suhu" :value="__('Suhu (°C)')" />
                    <x-text-input type="text" class="form-control @error('suhu') is-invalid @enderror block mt-1 w-full"
                        wire:model="suhu" />
                    <x-input-error class="mt-2" :messages="$errors->get('suhu')" />

                </div>
                <div class="mt-6">
                    <x-input-label for="kelembapan" :value="__('Kelembapan (%)')" />
                    <x-text-input type="text"
                        class="form-control @error('kelembapan') is-invalid @enderror block mt-1 w-full"
                        wire:model="kelembapan" />
                    <x-input-error class="mt-2" :messages="$errors->get('kelembapan')" />

                </div>
                <div class="mt-6">
                    <x-input-label for="name" :value="__('Drainase')" />
                    <img class="object-none object-center py-2" src={{url('drainase.png')}}>
                    <select wire:model="drainase"
                        class="form-control block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        @foreach ($drainaseOption as $key => $item)
                        <option value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div class="mt-6">
                    <x-input-label for="kedalamanTanah" :value="__('Kedalaman tanah (cm)')" />
                    <x-text-input type="text"
                        class="form-control @error('kedalamanTanah') is-invalid @enderror block mt-1 w-full"
                        wire:model="kedalamanTanah" />
                    <x-input-error class="mt-2" :messages="$errors->get('kedalamanTanah')" />

                </div>
                <div class="mt-6">
                    <x-input-label for="keasaman" :value="__('Keasaman')" />
                    <x-text-input type="text"
                        class="form-control @error('keasaman') is-invalid @enderror block mt-1 w-full"
                        wire:model="keasaman" />
                    <x-input-error class="mt-2" :messages="$errors->get('keasaman')" />

                </div>
            </div>
            <div>
                <div>
                    <x-input-label for="name" :value="__('Tekstur')" />
                    <img class="object-none object-center py-2" src={{url('tekstur1.png')}}>
                    <select wire:model="tekstur"
                        class="form-control block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        @foreach ($teksturOption as $key => $item)
                        <option value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div class="mt-6">
                    <x-input-label for="lereng" :value="__('Lereng (%)')" />
                    <x-text-input type="text"
                        class="form-control @error('lereng') is-invalid @enderror block mt-1 w-full"
                        wire:model="lereng" />
                    <x-input-error class="mt-2" :messages="$errors->get('lereng')" />

                </div>
                <div class="mt-6">
                    <x-input-label for="name" :value="__('Kedalaman Banjir')" />
                    <select wire:model="kedalamanBanjir"
                        class="form-control block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        @foreach ($banjirDalamOption as $key => $item)
                        <option value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div class="mt-6">
                    <x-input-label for="name" :value="__('Durasi Banjir')" />
                    <select wire:model="lamaBanjir"
                        class="form-control block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        @foreach ($banjirLamaOption as $key => $item)
                        <option value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <button type="submit" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
            {{-- <x-primary-button>Submit</x-primary-button> --}}
        </div>
        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
    </form>
</div>