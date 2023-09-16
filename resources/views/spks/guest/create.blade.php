<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Input Data Sistem Penunjang Keputusan') }}
        </h2>
    </x-slot>
    <div class="py-2">
        <div class="max-w-6xl mx-auto">
            <div class=" bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-3 font-extrabold text-serif text-center">Masukan data lahan</h1>
                    <div>
                        @livewire('spk-create', ['guest' => true])
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-user-layout>