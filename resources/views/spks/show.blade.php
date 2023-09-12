<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('Sistem Penunjang Keputusan') }}
        </h2>
    </x-slot>
    <div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('spks.home') }}" class="inline-flex items-center px-4 py-2 bg-gray-800  border border-transparent rounded-md font-semibold text-xs text-white  uppercase tracking-widest hover:bg-gray-700  focus:bg-gray-700  active:bg-gray-900  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2  transition ease-in-out duration-150">Back</a>
    </div>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <h1 class="mb-6">Data Input</h1>
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
                                {{ $spk }}
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
                </div>
            </div>
        </div>
    </div>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <h1 class="mb-3 font-semibold">Matrix Nilai</h1>
                    <div class="overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-md text-center">
                        <thead class=" text-gray-700 bg-gray-50">
                            <tr>
                                <th class="px-6 py-3">No</th>
                                <th>Nama Tanaman</th>
                                <th>Suhu (°C)</th>
                                <th>Kelembapan (%)</th>
                                <th>Drainase</th>
                                <th>Tekstur</th>
                                <th>Kedalaman tanah (cm)</th>
                                <th>Keasaman</th>
                                <th>Lereng (%)</th>
                                <th>Bahaya banjir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nilaiTanamans as $index => $nilaiTanaman)
                            <tr class="bg-white border-b mb-6 hover:bg-gray-50">
                                <td class="px-6 py-3">{{ $index}}.</td>
                                <td class="text-left">{{ $nilaiTanaman['nama'] }}</td>
                                <td>{{ $nilaiTanaman['suhu'] }}</td>
                                <td>{{ $nilaiTanaman['kelembapan'] }}</td>
                                <td>{{ $nilaiTanaman['drainase'] }}</td>
                                <td>{{ $nilaiTanaman['tekstur'] }}</td>
                                <td>{{ $nilaiTanaman['kedalaman_tanah'] }}</td>
                                <td>{{ $nilaiTanaman['keasaman'] }}</td>
                                <td>{{ $nilaiTanaman['lereng'] }}</td>
                                <td>{{ $nilaiTanaman['bahaya_banjir'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <h1 class="mb-3 font-semibold">Matrix Normalisasi Nilai</h1>
                    <div class="overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-md text-center">
                        <thead class=" text-gray-700 bg-gray-50">
                            <tr>
                                <th class="px-6 py-3">No</th>
                                <th>Nama Tanaman</th>
                                <th>Suhu (°C)</th>
                                <th>Kelembapan (%)</th>
                                <th>Drainase</th>
                                <th>Tekstur</th>
                                <th>Kedalaman tanah (cm)</th>
                                <th>Keasaman</th>
                                <th>Lereng (%)</th>
                                <th>Bahaya banjir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nilaiNormalisasiTanamans as $index => $nilaiTanaman)
                            <tr class="bg-white border-b mb-6 hover:bg-gray-50">
                                <td class="px-6 py-3">{{ $index}}.</td>
                                <td class="text-left">{{ $nilaiTanaman['nama'] }}</td>
                                <td>{{ $nilaiTanaman['suhu'] }}</td>
                                <td>{{ $nilaiTanaman['kelembapan'] }}</td>
                                <td>{{ $nilaiTanaman['drainase'] }}</td>
                                <td>{{ $nilaiTanaman['tekstur'] }}</td>
                                <td>{{ $nilaiTanaman['kedalaman_tanah'] }}</td>
                                <td>{{ $nilaiTanaman['keasaman'] }}</td>
                                <td>{{ $nilaiTanaman['lereng'] }}</td>
                                <td>{{ $nilaiTanaman['bahaya_banjir'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <h1 class="mb-3 font-semibold">Matrix Normalisasi Nilai * Pembobotan</h1>
                    <div class="overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-md text-center">
                        <thead class=" text-gray-700 bg-gray-50">
                            <tr>
                                <th class="px-6 py-3">No</th>
                                <th>Nama Tanaman</th>
                                <th>Suhu (°C)</th>
                                <th>Kelembapan (%)</th>
                                <th>Drainase</th>
                                <th>Tekstur</th>
                                <th>Kedalaman tanah (cm)</th>
                                <th>Keasaman</th>
                                <th>Lereng (%)</th>
                                <th>Bahaya banjir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nilaiPembobotanTanamans as $index => $nilaiTanaman)
                            <tr class="bg-white border-b mb-6 hover:bg-gray-50">
                                <td class="px-6 py-3">{{ $index}}.</td>
                                <td class="text-left">{{ $nilaiTanaman['nama'] }}</td>
                                <td>{{ $nilaiTanaman['suhu'] }}</td>
                                <td>{{ $nilaiTanaman['kelembapan'] }}</td>
                                <td>{{ $nilaiTanaman['drainase'] }}</td>
                                <td>{{ $nilaiTanaman['tekstur'] }}</td>
                                <td>{{ $nilaiTanaman['kedalaman_tanah'] }}</td>
                                <td>{{ $nilaiTanaman['keasaman'] }}</td>
                                <td>{{ $nilaiTanaman['lereng'] }}</td>
                                <td>{{ $nilaiTanaman['bahaya_banjir'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
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
                    <table class="w-full text-md text-center">
                        <thead class=" text-gray-700 bg-gray-50">
                            <tr>
                                <th class="px-6 py-3">Ranking</th>
                                <th>Nama Tanaman</th>
                                <th>Nilai Kecocokan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nilaiTotalTanamans as $index => $tanaman)
                            <tr  class="bg-white border-b mb-6 hover:bg-gray-50">
                                <td class="px-6 py-3">{{ $index + 1}}.</td>
                                <td>{{ $tanaman['nama']}}</td>
                                <td>{{ $tanaman['nilai']}}</td>
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