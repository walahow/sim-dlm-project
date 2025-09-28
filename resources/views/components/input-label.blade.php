@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-left text-sm text-white dark:text-white ml-3']) }}>
    {{ $value ?? $slot }}
</label>
