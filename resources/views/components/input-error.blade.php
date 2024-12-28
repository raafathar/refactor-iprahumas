@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-danger mt-2']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
