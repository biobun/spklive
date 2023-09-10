<div class="overflow-x-auto shadow-md sm:rounded-lg">
    {{-- @include('my_components.alert-success') --}}
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <table class="w-full text-lg text-center">
        <thead class=" text-gray-700 bg-gray-50">
            <tr>
                <th class="px-6 py-3">No.</th>
                <th class="px-6 py-3">Nama Tanaman</th>
                <th class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tanamans as $index => $tanaman)
            <tr class="bg-white border-b mb-6 hover:bg-gray-50">
                <td class="px-6 py-3">{{ $index + 1 }}</td>
                <td class="px-6 py-3">{{ $tanaman->name }}</td>
                <td class="px-6 py-3">
                    <a href="{{ route('tanamans.edit', $tanaman->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800  border border-transparent rounded-md font-semibold text-xs text-white  uppercase tracking-widest hover:bg-gray-700  focus:bg-gray-700  active:bg-gray-900  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2  transition ease-in-out duration-150">Ubah Kriteria</a>
                    <button wire:click="delete({{ $tanaman->id }})" class="inline-flex items-center px-4 py-2 bg-gray-800  border border-transparent rounded-md font-semibold text-xs text-white  uppercase tracking-widest hover:bg-gray-700  focus:bg-gray-700  active:bg-gray-900  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2  transition ease-in-out duration-150">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>