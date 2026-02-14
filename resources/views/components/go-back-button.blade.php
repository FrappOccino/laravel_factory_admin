@props([
    'text' => 'Go Back',  // default button text
])

<button 
    type="button"
    onclick="history.back()"
    {{ $attributes->merge(['class' => 'bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-4 py-2 rounded shadow transition duration-200 mb-5']) }}
>
    {{ $text }}
</button>
