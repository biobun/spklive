@extends('layouts.master')

@section('content')
<div class="container">
    <div class="mb-3">
        <a href="{{ route('kriterias.home') }}" class="btn btn-primary">Back</a>
        <a href="{{ route('kriterias.edit', $kriteria->id) }}" class="btn btn-primary">Edit</a>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Nama kriteria</label>
        <input type="text" class="form-control" value="{{ $kriteria->name }}" disabled>
    </div>
    <div class="mb-3">
        <label for="bobot" class="form-label">Bobot</label>
        <input type="text" class="form-control" value="{{ $kriteria->bobot }}" disabled>
    </div>
</div>
@endsection