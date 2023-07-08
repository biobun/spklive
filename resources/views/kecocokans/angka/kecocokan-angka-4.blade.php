
<div class="grid grid-cols-4 gap-6">
    <div>
        <x-input-label for="value2" :value="__('Nilai >')" />
        <x-text-input type="text"
            class="form-control is-invalid @enderror block mt-1 w-full"  id="value2" name="value2"  value="{{ $value2 }}"/>
    </div>
</div>
{{-- <div>
    <table class="w-full text-sm text-center">
        <thead class=" text-gray-700 bg-gray-50">
            <tr>
                <th colspan="3" class="px-6 py-3 text-center">Nilai ></th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b mb-6 text-center">
                <td>Nilai ></td>
                <td class="px-6 py-3"> <x-text-input type="text"
                    class="form-control is-invalid @enderror block mt-1 w-full" 
                     /></td>
            </tr>
        </tbody>
    </table>
</div> --}}