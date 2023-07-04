@extends('layouts.master')

@section('content')
<div class="container">
    <div class="mb-3">
        <a href="{{ route('spks.home') }}" class="btn btn-primary">Back</a>
        {{-- <a href="{{ route('kriterias.edit', $kriteria->id) }}" class="btn btn-primary">Edit</a> --}}
    </div>
</div>
@endsection