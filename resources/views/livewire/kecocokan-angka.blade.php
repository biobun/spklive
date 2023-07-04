<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="mb-3">
        <label for="type" class="form-label">Tipe Data</label>
        <select class="form-control m-bot15" wire:model="inputType" wire:change="change">
            <option value="1">1 Rentang nilai</option>
            <option value="2">2 Rentang nilai</option>
            <option value="3">Nilai lebih kecil dari</option>
            <option value="4">Nilai lebih besar dari</option>
            <option value="5">Nilai lebih kecil dan lebih besar</option>
        </select>
    </div>

    @switch($inputType)
    @case(1)
    <table class="table" border="1">
        <thead>
            <tr>
                <th colspan="3" class="text-center">Rentang Nilai</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="text" class="form-control" @error('inputDataMin1') is-invalid @enderror wire:model="inputDataMin1" wire:keyup="updateData"></td>
                <td>-</td>
                <td><input type="text" class="form-control" @error('inputDataMax1') is-invalid @enderror wire:model="inputDataMax1" wire:keyup="updateData"></td>
            </tr>
        </tbody>
    </table>                
    @break
    @case(2)
    <table class="table" border="1">
        <thead>
            <tr>
                <th colspan="3" class="text-center">Rentang Nilai 1</th>
                <th colspan="3" class="text-center">Rentang Nilai 2</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="text" class="form-control" @error('inputDataMin1') is-invalid @enderror wire:model="inputDataMin1" wire:keyup="updateData"></td>
                <td>-</td>
                <td><input type="text" class="form-control" @error('inputDataMax1') is-invalid @enderror wire:model="inputDataMax1" wire:keyup="updateData"></td>
                <td><input type="text" class="form-control" @error('inputDataMin2') is-invalid @enderror wire:model="inputDataMin2" wire:keyup="updateData"></td>
                <td>-</td>
                <td><input type="text" class="form-control" @error('inputDataMax2') is-invalid @enderror wire:model="inputDataMax2" wire:keyup="updateData"></td>
            </tr>
        </tbody>
    </table>                
    @break
    @case(3)
    <div class="row">
        <div class="column mb-3">
            <label for="bobot" class="form-label">Nilai <</label>
            <input type="text" class="form-control" wire:model="inputDataMin1"  wire:keyup="updateData">
        </div>
    </div>
    @break
    @case(4)
    <div class="row">
        <div class="column mb-3">
            <label for="bobot" class="form-label">Nilai ></label>
            <input type="text" class="form-control" wire:model="inputDataMax1"  wire:keyup="updateData">
        </div>
    </div>
    @break
    @case(5)
    <table class="table" border="1">
        <thead>
            <tr>
                <th colspan="3" class="text-center">Nilai Lebih Kecil dari</th>
                <th colspan="3" class="text-center">Nilai Lebih Besar dari</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><</td>
                <td><input type="text" class="form-control" @error('inputDataMin1') is-invalid @enderror wire:model="inputDataMin1" wire:keyup="updateData"></td>
                <td> </td>
                <td> </td>
                <td>></td>
                <td><input type="text" class="form-control" @error('inputDataMax1') is-invalid @enderror wire:model="inputDataMax1" wire:keyup="updateData"></td>
            </tr>
        </tbody>
    </table>
    @break
    @default
    <table class="table" border="1">
        <thead>
            <tr>
                <th colspan="3" class="text-center">Rentang Nilai</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="text" class="form-control" @error('inputDataMin1') is-invalid @enderror wire:model="inputDataMin1" wire:keyup="updateData"></td>
                <td>-</td>
                <td><input type="text" class="form-control" @error('inputDataMax1') is-invalid @enderror wire:model="inputDataMax1" wire:keyup="updateData"></td>
            </tr>
        </tbody>
    </table>
    @endswitch
</div>
