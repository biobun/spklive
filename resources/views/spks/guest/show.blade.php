<x-user-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <div class="grid grid-cols-2 mb-6">
                        <div>
                            <h1 class="font-semibold ">Data Input</h1>
                        </div>
                        <div class="flex justify-end">
                            <a href="{{ route('spk.guest.create') }}"
                            class="rounded-md bg-indigo-600 px-2 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Input data baru</a>
                        </div>
                    </div>
                    <table class="table mt-1 w-full" border="1">
                        <thead>
                            <tr>
                                <th>Suhu (°C)</th>
                                <th>Curah Hujan (mm)</th>
                                <th>Kelembapan (%)</th>
                                <th>Drainase</th>
                                <th>Tekstur</th>
                                <th>Kedalaman tanah (cm)</th>
                                <th>Keasaman</th>
                                <th>Lereng (%)</th>
                                <th>Kedalaman banjir</th>
                                <th>Lamanya banjir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>{{ $spk->suhu }}</td>
                                <td>{{ $spk->curah_hujan }}</td>
                                <td>{{ $spk->kelembapan }}</td>
                                <td>{{ $dataDrainase[$spk->drainase] }}</td>
                                <td>{{ $dataTekstur[$spk->tekstur] }}</td>
                                <td>{{ $spk->kedalaman_tanah }}</td>
                                <td>{{ $spk->keasaman }}</td>
                                <td>{{ $spk->lereng }}</td>
                                <td>{{ $dataBanjirDalam[$spk->banjir_dalam] }}</td>
                                <td>{{ $dataBanjirLama[$spk->banjir_lama] }}</td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- <div class="mt-6">
                        <table class="table mt-1 w-full" border="1">
                            <thead>
                                <tr>
                                    <th>Tanaman yang sebelumnya di tanam?</th>
                                    <th>Total produktivitas tanaman (ton/ha)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>{{ $spk->extanaman }}</td>
                                    <td>{{ $spk->produktivitas }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <h1 class="mb-3 font-semibold">Hasil Perhitungan Kecocokan Tanaman</h1>
                    <div class="overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-md py-4">
                            <thead class="text-gray-700 bg-gray-50">
                                <tr>
                                    <th class="py-3 px-5 text-center">Ranking</th>
                                    <th class="py-3 px-5 text-left">Nama Tanaman</th>
                                    <th class="py-3 px-5 text-center">Rekomendasi</th>
                                    <th class="py-3 px-5 text-center">Nilai Kecocokan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nilaiTotalTanamans as $index => $tanaman)
                                <tr class="bg-white border-b mb-6 hover:bg-gray-50">
                                    <td class="py-3 px-5 text-center">{{ $index + 1}}.</td>
                                    <td class="py-3 px-5 text-left">{{ $tanaman['nama']}}</td>
                                    <td class="py-3 px-5 text-center flex justify-center items-center">
                                        @if ($tanaman['rekomendasi'])
                                            <x-heroicon-s-check-badge class="w-6 h-6 text-green-500" />
                                        @else
                                            <x-heroicon-s-x-circle class="w-6 h-6 text-red-500" />       
                                        @endif
                                      </svg>
                                    </td>
                                    <td class="py-3 px-5 text-center">{{ $tanaman['nilai']}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-user-layout>