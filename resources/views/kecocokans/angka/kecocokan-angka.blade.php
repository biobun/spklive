<section>
    <div x-data="{ pilihanInput : {{ $pilihanInput }} }" class="grid grid-cols-4 gap-6">
        <div>
            {{-- <label for="type" class="form-label">Tipe Data</label> --}}
            <x-input-label for="type" :value="__('Tipe Data')" />
            <select class="mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"  x-model.number="pilihanInput" name="pilihanInput" value="pilihanInput">
                <option value="1" >1 Rentang nilai</option>
                <option value="2">2 Rentang nilai</option>
                <option value="3">Nilai lebih kecil dari</option>
                <option value="4">Nilai lebih besar dari</option>
                <option value="5">Nilai lebih kecil dan lebih besar</option>
            </select>
        </div>        
        <div class=" col-span-3">                  
            <template x-if="pilihanInput==1">
                @include('kecocokans.angka.kecocokan-angka-1')
            </template>
            <template x-if="pilihanInput==2">
                @include('kecocokans.angka.kecocokan-angka-2')
            </template>
            <template x-if="pilihanInput==3">
                @include('kecocokans.angka.kecocokan-angka-3')
            </template>
            <template x-if="pilihanInput==4">
                @include('kecocokans.angka.kecocokan-angka-4')
            </template>
            <template x-if="pilihanInput==5">
                @include('kecocokans.angka.kecocokan-angka-5')
            </template>
        </div>
    </div>
</section>