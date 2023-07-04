@extends('layouts.master')

@push('styles')
@livewireStyles
@endpush

@push('scripts')
@livewireScripts
@endpush

@section('content')
<div class="container">
    <div class="mb-3">
        <a href="{{ route('kriterias.home') }}" class="btn btn-primary">Back</a>
    </div>
    <div class="row mb-4">
        <div class="col-md-6">
            @livewire('kriteria-edit', ['kriteria'=>$kriteria])
        </div>
    </div>
</div>
@endsection