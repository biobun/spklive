<div class="grid grid-cols-4 gap-6">
    <div>
        <x-input-label for="kelembapan" :value="__('Nilai Lebih kecil dari')" />
        <x-text-input type="text"
            class="form-control is-invalid @enderror block mt-1 w-full" :value="old('value1', $value1)" name="value1" />
            <x-input-error class="mt-2" :messages="$errors->get('value1')" />
    </div>
    <div>
        <x-input-label for="kelembapan" :value="__('Nilai lebih besar dari')" />
        <x-text-input type="text"
            class="form-control is-invalid @enderror block mt-1 w-full" :value="old('value2', $value2)" name="value2" />
            <x-input-error class="mt-2" :messages="$errors->get('value2')" />
    </div>
</div>
{{-- <div>
    <table class="w-full text-sm text-center">
        <thead class=" text-gray-700 bg-gray-50">
            <tr>
                <th colspan="3" class="text-center">Nilai Lebih Kecil dari</th>
                <th colspan="3" class="text-center">Nilai Lebih Besar dari</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b mb-6 text-center">
                <td><</td>
                <td class="px-6 py-3"> <x-text-input type="text"
                    class="form-control is-invalid @enderror block mt-1 w-full" 
                     /></td>
                <td></td>
                <td></td>
                <td>></td>
                <td class="px-6 py-3"> <x-text-input type="text"
                    class="form-control is-invalid @enderror block mt-1 w-full" 
                     /></td>
            </tr>
        </tbody>
    </table>
</div> --}}