@props(['value'])

{{-- required --}}
@if ($attributes->has('required'))
    <label {{ $attributes->merge(['class' => 'form-label']) }}>
        {{ $value ?? $slot }}
        <span class="text-danger">*</span>
    </label>
@else
    <label {{ $attributes->merge(['class' => 'form-label']) }}>
        {{ $value ?? $slot }}
    </label>
@endif
