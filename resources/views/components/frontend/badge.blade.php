@props(['url'=>'', 'text'])

<span class="break-words inline-flex m-1">
    @if ($url)
    <a href="{{ $url }}" class="group text-sm font-semibold px-2.5 py-1 bg-gray-100 hover:bg-gray-200 text-gray-600 rounded dark:bg-gray-700 dark:text-gray-300 transition ease-out duration-300">
        {{ $text }}
    </a>
    @else
    <span class="group text-sm font-semibold px-2.5 py-1 bg-gray-100 hover:bg-gray-200 text-gray-600 rounded dark:bg-gray-700 dark:text-gray-300 transition ease-out duration-300">
        {{ $text }}
    </span>
    @endif
</span>