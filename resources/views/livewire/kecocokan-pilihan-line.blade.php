<div>
    {{-- Nothing in the world is as soft and yielding as water. --}} 
    <div>
        <input type="checkbox"  id="{{ $selection_id }}" wire:model="selected" @if ($selected=='1') checked @endif @if ($disable) disabled @endif>
        <label for="option">{{ $item }} {{ $selected }}</label>
    </div>
</div>
