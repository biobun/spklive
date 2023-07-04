@extends('layouts.master')

@section('content')
<div class="container">
    <div class="mb-3">
        <a href="{{ route('tanamans.home') }}" class="btn btn-primary">Back</a>
        <a href="{{ route('tanamans.edit', $tanaman->id) }}" class="btn btn-primary">Edit</a>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Nama Tanaman</label>
        <input type="text" class="form-control" value="{{ $tanaman->name }}" disabled>
    </div>
    <table class="table" border="1">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Kriteria</th>
                <th colspan="4">Nilai Kecocokan Lahan</th>
            </tr>
            <tr>
                <th>S1 (3)</th>
                <th>S2 (2)</th>
                <th>S3 (1)</th>
                <th>N (0)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Suhu</td>
                <td>
                    <a href="{{ route('tanamans.edit', $tanaman->id) }}" class="btn btn-warning">Input</a>
                </td>
                <td>
                    <a href="{{ route('tanamans.edit', $tanaman->id) }}" class="btn btn-warning">Input</a>
                </td>
                <td>
                    <a href="{{ route('tanamans.edit', $tanaman->id) }}" class="btn btn-warning">Input</a>
                </td>
                <td>
                    <a href="{{ route('tanamans.edit', $tanaman->id) }}" class="btn btn-warning">Input</a>
                </td>
                <td>
                    <a href="{{ route('tanamans.edit', $tanaman->id) }}" class="btn btn-warning">Input</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Kelembapan</td>
                <td>
                    <a href="{{ route('tanamans.edit', $tanaman->id) }}" class="btn btn-warning">Input</a>
                </td>
                <td>
                    <a href="{{ route('tanamans.edit', $tanaman->id) }}" class="btn btn-warning">Input</a>
                </td>
                <td>
                    <a href="{{ route('tanamans.edit', $tanaman->id) }}" class="btn btn-warning">Input</a>
                </td>
                <td>
                    <a href="{{ route('tanamans.edit', $tanaman->id) }}" class="btn btn-warning">Input</a>
                </td>
                <td>
                    <a href="{{ route('tanamans.edit', $tanaman->id) }}" class="btn btn-warning">Input</a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Drainase</td>
                <td>22-29</td>
                <td>22-29</td>
                <td>22-29</td>
                <td>22-29</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Suhu</td>
                <td>22-29</td>
                <td>22-29</td>
                <td>22-29</td>
                <td>22-29</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Kelembapan</td>
                <td>22-29</td>
                <td>22-29</td>
                <td>22-29</td>
                <td>22-29</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Drainase</td>
                <td>22-29</td>
                <td>22-29</td>
                <td>22-29</td>
                <td>22-29</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Suhu</td>
                <td>22-29</td>
                <td>22-29</td>
                <td>22-29</td>
                <td>22-29</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Kelembapan</td>
                <td>22-29</td>
                <td>22-29</td>
                <td>22-29</td>
                <td>22-29</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Drainase</td>
                <td>22-29</td>
                <td>22-29</td>
                <td>22-29</td>
                <td>22-29</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection