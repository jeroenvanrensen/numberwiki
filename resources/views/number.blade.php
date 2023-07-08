<x-layout :title="$number->number">
    <div class="typography">
        <h1>$ {{ $number->number }} $</h1>

        <p>
            @if ($number->number === 0)
                $ {{ $number->number }} $ ({{ $number->name() }}) is the number preceding
                <a href="{{ route('number', $number->successor()) }}">$ {{ $number->successor() }} $</a>. Since it is the
                smallest natural number, it does not have a predecessor.
            @else
                $ {{ $number->number }} $ ({{ $number->name() }}) is the number succeeding <a
                    href="{{ route('number', $number->predecessor()) }}">$
                    {{ $number->predecessor() }} $</a> and preceding
                <a href="{{ route('number', $number->successor()) }}">$ {{ $number->successor() }} $</a>.
            @endif
        </p>
    </div>
</x-layout>
