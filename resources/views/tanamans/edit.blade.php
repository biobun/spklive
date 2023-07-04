<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tanaman dan Kecocokan Lahan') }}
        </h2>
    </x-slot>
    <div class="pt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('tanamans.home') }}" class="inline-flex items-center px-4 py-2 bg-gray-800  border border-transparent rounded-md font-semibold text-xs text-white  uppercase tracking-widest hover:bg-gray-700  focus:bg-gray-700  active:bg-gray-900  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2  transition ease-in-out duration-150">Back</a>
    </div>
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-3">Edit Tanaman</h1> --}}
                    {{-- <div>
                        <a href="{{ route('tanamans.home') }}" class="btn btn-primary">Back</a>
                    </div> --}}
                    <div>
                        @livewire('tanaman-edit', ['tanaman'=>$tanaman])
                    </div>
                {{-- </div>
            </div>
        </div>
    </div> --}}
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
    <a href="{{ route('tanamans.home') }}" class="btn btn-primary">Back</a>
</div>
<div>
    <div>
        @livewire('tanaman-edit', ['tanaman'=>$tanaman])
    </div>
</div>
@endsection --}}