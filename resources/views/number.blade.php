<x-layout :title="$number->number">
    <h1 class="text-7xl font-bold">{{ $number->number }}</h1>

    <p>
        @if ($number->number === 0)
            <strong>{{ $number->number }}</strong> is the number preceding
            <a href="{{ $number->successor()->link() }}">{{ $number->successor() }}</a>. Since it is the smallest natural
            number, it does not have a predecessor.
        @else
            <strong>{{ $number->number }}</strong> is the number succeeding <a
                href="{{ $number->predecessor()->link() }}">{{ $number->predecessor() }}</a> and preceding
            <a href="{{ $number->successor()->link() }}">{{ $number->successor() }}</a>.
        @endif
    </p>
</x-layout>
