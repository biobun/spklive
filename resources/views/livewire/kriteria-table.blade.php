<div>
    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        {{-- @include('my_components.alert-success') --}}
        {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
        <table class="w-full text-lg text-center">
            <thead class=" bg-gray-50">
                <tr>
                    <th class="py-3">No.</th>
                    <th class="py-3">Nama Kriteria</th>
                    <th colspan="3">Bobot</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kriterias as $index => $kriteria)
                <tr class="bg-white border-b mb-6 hover:bg-gray-50">
                    <td class="py-3">{{ $index}}</td>
                    <td class="text-left">{{ $kriteria['name'] }}</td>
                    <td><button wire:click="add({{ $kriteria['id'] }})" @if ($total_bobot>99) disabled @endif class=" text-sm inline-flex items-center px-4 py-2 bg-gray-800  border border-transparent rounded-md font-semibold text-white  uppercase tracking-widest hover:bg-gray-700  focus:bg-gray-700  active:bg-gray-900  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2  transition ease-in-out duration-150">+</button></td>
                    <td>{{ $kriteria['bobot'] }}</td>
                    <td><button wire:click="sub({{ $kriteria['id'] }})"@if ($kriteria['bobot']<1) disabled @endif class="text-sm inline-flex items-center px-4 py-2 bg-gray-800  border border-transparent rounded-md font-semibold text-white  uppercase tracking-widest hover:bg-gray-700  focus:bg-gray-700  active:bg-gray-900  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2  transition ease-in-out duration-150">-</button></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="font-semibold text-gray-900 dark:text-white">
                    <th class="py-3" colspan="2" scope="row">Total bobot</th>
                    <td colspan="3" class="text-center">{{ $total_bobot }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>