<div>
    {{-- The best athlete wants his opponent at his best. --}}
    @include('my_components.alert-success')
    
    <form wire:submit.prevent="store" class="mt-6 space-y-6">
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input type="text" class="form-control @error('name') is-invalid @enderror block mt-1 w-full" wire:model="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />

        </div>
        <x-primary-button>Submit</x-primary-button>
        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
    </form>
</div>