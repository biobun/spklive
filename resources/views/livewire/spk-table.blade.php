{{-- <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden rounded-none md:rounded-lg"> --}}
    {{-- @include('my_components.alert-success') --}}
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-center">
        <thead class=" text-gray-700 bg-gray-100">
            <tr>
                <th class="px-6 py-3">No</th>
                <th>Create Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($spks as $index => $spk)
            <tr class="bg-white border-b mb-6 hover:bg-gray-50">
                <td class="px-6 py-3">{{ $index + 1 }}</td>
                <td>{{ $spk->created_at }}</td>
                <td>
                    <a href="{{ route('spk.details', $spk->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800  border border-transparent rounded-md font-semibold text-xs text-white  uppercase tracking-widest hover:bg-gray-700  focus:bg-gray-700  active:bg-gray-900  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2  transition ease-in-out duration-150">Detail</a>
                    {{-- <a href="{{ route('tanamans.edit', $tanaman->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800  border border-transparent rounded-md font-semibold text-xs text-white  uppercase tracking-widest hover:bg-gray-700  focus:bg-gray-700  active:bg-gray-900  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2  transition ease-in-out duration-150">Edit</a> --}}
                    <button wire:click="delete({{ $spk->id }})" class="inline-flex items-center px-4 py-2 bg-gray-800  border border-transparent rounded-md font-semibold text-xs text-white  uppercase tracking-widest hover:bg-gray-700  focus:bg-gray-700  active:bg-gray-900  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2  transition ease-in-out duration-150">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>