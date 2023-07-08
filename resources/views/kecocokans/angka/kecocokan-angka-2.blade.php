<div class="grid  grid-cols-4 gap-6">
    <div>
        <x-input-label for="kelembapan" :value="__('Nilai minimum 1')" />
        <x-text-input type="text"
        class="form-control is-invalid @enderror block mt-1 w-full" id="value1" name="value1"   value="{{ $value1 }}" autofocus/>
    </div>
    <div>
        <x-input-label for="kelembapan" :value="__('Nilai maximum 1')" />
        <x-text-input type="text"
        class="form-control is-invalid @enderror block mt-1 w-full" id="value2" name="value2"  value="{{ $value2 }}"/>
    </div>

    <div>
        <x-input-label for="kelembapan" :value="__('Nilai minimum 2')" />
        <x-text-input type="text"
        class="form-control is-invalid @enderror block mt-1 w-full" id="value3" name="value3"  value="{{ $value3 }}"/>
    </div>
    <div>
        <x-input-label for="kelembapan" :value="__('Nilai maximum 2')" />
        <x-text-input type="text"
        class="form-control is-invalid @enderror block mt-1 w-full" id="value4" name="value4"  value="{{ $value4 }}"/>
    </div>
</div>
{{-- <div>
    <div>
        <table class="w-full text-sm text-center">
            <thead class=" text-gray-700 bg-gray-50">
                <tr>
                    <th colspan="3" class="px-6 py-3 text-center">Rentang Nilai 1</th>
                    <th colspan="3" class="px-6 py-3 text-center">Rentang Nilai 2</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b mb-6 text-center">
                    <td class="px-6 py-3"> <x-text-input type="text"
                        class="form-control is-invalid @enderror block mt-1 w-full" 
                         />
                    <td>-</td>
                    <td class="px-6 py-3"> <x-text-input type="text"
                        class="form-control is-invalid @enderror block mt-1 w-full" 
                         /></td>
                    <td class="px-6 py-3"> <x-text-input type="text"
                        class="form-control is-invalid @enderror block mt-1 w-full" 
                            />
                    <td>-</td>
                    <td class="px-6 py-3"> <x-text-input type="text"
                        class="form-control is-invalid @enderror block mt-1 w-full" 
                            /></td>
                </tr>
            </tbody>
        </table>
    </div> --}}