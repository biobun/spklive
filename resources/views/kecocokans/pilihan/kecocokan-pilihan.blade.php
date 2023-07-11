<section>
    @foreach ($datasItemNameSelected as $key => $item)
        <div>
            <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox"  id="selected{{ $key }}" name="selected{{ $key }}" @if ($item['disable']) disabled @endif @if ($item['selected']) checked @endif>
            <label class="@if ($item['disable'])text-gray-400 @endif" for="option">{{ $item['name'] }}</label>
        </div>
    @endforeach
</section>