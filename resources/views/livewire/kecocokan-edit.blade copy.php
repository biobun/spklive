<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="card">
        <div class="card-header">Edit Data Kecocokan Lahan</div>
        <div class="card-body">
            <form wire:submit.prevent="update">
                <div class="mb-3">
                    <label for="name" class="form-label">Tanaman</label>
                    <input type="text" class="form-control" value="{{ $tanaman->name }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Kriteria</label>
                    <input type="text" class="form-control" value="{{ $kriteria->name }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="bobot" class="form-label">Nilai</label>
                    <input type="text" class="form-control" value="{{ $kecocokan }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="bobot" class="form-label">Bobot Nilai</label>
                    <input type="text" class="form-control" value="{{ $kriteria->bobot }}" disabled>
                </div>
                @if ($kriteria->type_data == 'angka')
                @livewire('kecocokan-angka', ['dataValue'=>$dataValue, 'inputType'=>$inputAngkaType])
                @elseif ($kriteria->type_data == 'pilihan')
                @livewire('kecocokan-pilihan', ['dataValue'=>$dataValue, 'kriteria' => $kriteria, 'tanaman' => $tanaman, 'kecocokan_id' => $kecocokan_id])
                @else
                @livewire('kecocokan-pilihan2', ['dataValue'=>$dataValue, 'kriteria' => $kriteria, 'tanaman' => $tanaman, 'kecocokan_id' => $kecocokan_id])
                @endif


                {{-- <div class="mb-3">
                    <label for="type" class="form-label">Tipe Data</label>
                    <select class="form-control m-bot15" wire:model="type">
                        <option value="1">1 Rentang nilai</option>
                        <option value="2">2 Rentang nilai</option>
                        <option value="3">1 Nilai Minimum</option>
                        <option value="4">1 Nilai Maximum</option>
                    </select>
                </div>

                @switch($type)
                @case(1)
                <table class="table" border="1">
                    <thead>
                        <tr>
                            <th colspan="3">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" @error('inputDataMin1') is-invalid @enderror
                                    wire:model="inputDataMin1"></td>
                            <td>-</td>
                            <td><input type="text" class="form-control" @error('inputDataMax1') is-invalid @enderror
                                    wire:model="inputDataMax1"></td>
                        </tr>
                    </tbody>
                </table>
                @break
                @case(2)
                <table class="table" border="1">
                    <thead>
                        <tr>
                            <th colspan="3">Nilai 1</th>
                            <th colspan="3">Nilai 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" @error('inputDataMin1') is-invalid @enderror
                                    wire:model="inputDataMin1"></td>
                            <td>-</td>
                            <td><input type="text" class="form-control" @error('inputDataMax1') is-invalid @enderror
                                    wire:model="inputDataMax1"></td>
                            <td><input type="text" class="form-control" @error('inputDataMin2') is-invalid @enderror
                                    wire:model="inputDataMin2"></td>
                            <td>-</td>
                            <td><input type="text" class="form-control" @error('inputDataMax2') is-invalid @enderror
                                    wire:model="inputDataMax2"></td>
                        </tr>
                    </tbody>
                </table>
                @break
                @case(3)
                <div class="row">
                    <div class="column mb-3">
                        <label for="bobot" class="form-label">Nilai Min</label>
                        <input type="text" class="form-control" wire:model="inputDataMin1">
                    </div>
                </div>
                @break
                @case(4)
                <div class="row">
                    <div class="column mb-3">
                        <label for="bobot" class="form-label">Nilai Max</label>
                        <input type="text" class="form-control" wire:model="inputDataMax1">
                    </div>
                </div>
                @break
                @default
                <table class="table" border="1">
                    <thead>
                        <tr>
                            <th colspan="3" class="text-center">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" @error('inputDataMin1') is-invalid @enderror
                                    wire:model="inputDataMin1"></td>
                            <td>-</td>
                            <td><input type="text" class="form-control" @error('inputDataMax1') is-invalid @enderror
                                    wire:model="inputDataMax1"></td>
                        </tr>
                    </tbody>
                </table>
                @endswitch --}}
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('tanamans.edit', $tanaman->id) }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>