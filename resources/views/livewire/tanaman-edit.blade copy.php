<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <form wire:submit.prevent="update" class="mt-6 space-y-6">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="mb-3">Edit Tanaman</h1>
                        <div class="mb-3 mt-3">
                            <x-input-label for="name" :value="__('Nama')" />
                            <x-text-input type="text" class="form-control @error('name') is-invalid @enderror block mt-1 w-full" wire:model="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div class="mt-6">
                            <x-primary-button>
                                Update
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-3">Pengaturan Kecocokan Tanaman</h1>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="table w-full text-left">
                        <thead class="uppercase text-center">
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Kriteria</th>
                                <th colspan="8" class="text-center">Nilai Kecocokan Lahan</th>
                            </tr>
                            <tr>
                                <th colspan="2" scope="col" class="px-6 py-3">S1 (3)</th>
                                <th colspan="2" scope="col" class="px-6 py-3">S2 (2)</th>
                                <th colspan="2" scope="col" class="px-6 py-3">S3 (1)</th>
                                <th colspan="2" scope="col" class="px-6 py-3">N (0)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kriterias as $index => $kriteria)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50  dark:hover:bg-gray-600">
                                <td  class="px-6 py-4">{{ $index + 1 }}</td>
                                <td  class="px-6 py-4">{{ $kriteria->name }}@if($kriteria->lambang) ({{ $kriteria->lambang }})@endif
                                </td>
                                
                                    @livewire('kecocokan-detail', ['tanaman_id' => $tanaman_id,'kriteria_id' =>
                                    $kriteria->id,
                                    'kecocokan' => 3], key('kecocokan-3-'.$kriteria->id))
                                
                                
                                    @livewire('kecocokan-detail', ['tanaman_id' => $tanaman_id,'kriteria_id' =>
                                    $kriteria->id,
                                    'kecocokan' => 2], key('kecocokan-2-'.$kriteria->id))
                                
                                    @livewire('kecocokan-detail', ['tanaman_id' => $tanaman_id,'kriteria_id' =>
                                    $kriteria->id,
                                    'kecocokan' => 1], key('kecocokan-1-'.$kriteria->id))
                                
                                    @livewire('kecocokan-detail', ['tanaman_id' => $tanaman_id,'kriteria_id' =>
                                    $kriteria->id,
                                    'kecocokan' => 0], key('kecocokan-0-'.$kriteria->id))
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>


        {{-- <h1 class="mb-3">Setting Kecocokan Lahan</h1>
        <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden rounded-none md:rounded-lg">

        </div> --}}

        {{-- <button type="submit" class="btn btn-warning">Update</button> --}}
    </form>
</div>