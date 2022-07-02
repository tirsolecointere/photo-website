@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border border-gray-200 focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-3 py-2']) !!}>
