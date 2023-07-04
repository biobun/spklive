<x-app-layout>
    <x-slot name="header"> 
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('Sistem Penunjang Keputusan') }}
        </h2>
    </x-slot>
    <div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('spk.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800  border border-transparent rounded-md font-semibold text-xs text-white  uppercase tracking-widest hover:bg-gray-700  focus:bg-gray-700  active:bg-gray-900  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2  transition ease-in-out duration-150">+ Create New</a>
    </div>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">                    
                    <div class="py-4">
                        @livewire('spk-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- @extends('layouts.master')

@push('styles')
@livewireStyles
@endpush

@push('scripts')
@livewireScripts
@endpush


@section('content')
<div>
    <h1 class="mb-3">Sistem Penunjang Keputusan</h1>
    <div class="row mb-4">
        <div class="col-md-6">
            @livewire('tanaman-create')
        </div>
    </div>
    <div class="">
        @livewire('tanaman-table')
    </div>
</div>
@endsection --}}