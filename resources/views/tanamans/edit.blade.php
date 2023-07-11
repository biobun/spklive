<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tanaman dan Kecocokan Lahan') }}
        </h2>
    </x-slot>
    <div class="pt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('tanamans.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800  border border-transparent rounded-md font-semibold text-xs text-white  uppercase tracking-widest hover:bg-gray-700  focus:bg-gray-700  active:bg-gray-900  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2  transition ease-in-out duration-150">Back</a>
    </div>
    <div>
        {{-- @livewire('tanaman-edit', ['tanaman'=>$tanaman]) --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    {{-- <h1 class="mb-3 text-lg">Pengaturan Kecocokan Tanaman</h1> --}}
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-md text-center">
                        <thead class=" text-gray-700 bg-gray-100">
                            <tr>
                                <th  class="px-6 py-2" rowspan="2">No.</th>
                                <th rowspan="2">Kriteria</th>
                                <th colspan="4" class="text-center py-2">Nilai Kecocokan Lahan</th>
                            </tr>
                            <tr>
                                <th  scope="col" class="px-6 py-2 bg-green-300">S1 (3)</th>
                                <th  scope="col" class="px-6 py-2 bg-green-100">S2 (2)</th>
                                <th scope="col" class="px-6 py-2 bg-orange-100">S3 (1)</th>
                                <th  scope="col" class="px-6 py-2 bg-red-200">N (0)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kriterias as $index => $kriteria)
                            <tr class="bg-white border-b   hover:bg-gray-50  ">
                                <td  class="px-6 py-4 text-center">{{ $index + 1 }}.</td>
                                <td  class="px-6 py-4 text-left">{{ $kriteria->name }}@if($kriteria->lambang) ({{ $kriteria->lambang }})@endif
                                </td>
                                    
                                    {{-- @livewire('kecocokan-detail', ['tanaman_id' => $tanaman_id,'kriteria_id' =>
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
                                    'kecocokan' => 0], key('kecocokan-0-'.$kriteria->id)) --}}

                                    @include('tanamans.partials.kecocokan-detail', ['kecocokan' => 3])
                                    @include('tanamans.partials.kecocokan-detail', ['kecocokan' => 2])
                                    @include('tanamans.partials.kecocokan-detail', ['kecocokan' => 1])
                                    @include('tanamans.partials.kecocokan-detail', ['kecocokan' => 0])
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>