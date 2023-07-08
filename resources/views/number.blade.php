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

        @if ($number !== 0 && $number !== 1)
            @if ($number->isPrime())
                <h2>Prime</h2>
                <p>The number $ {{ $number }} $ is a <em>prime number</em>, which means that its only divisors
                    are itself
                    and $ 1 $.
                </p>
            @else
                <h2>Composite</h2>
                <p>The number $ {{ $number }} $ is a <em>composite number</em>, which means that it is not prime
                    and can
                    be factored into primes:</p>
                <p>$
                    {{ collect($number->factors())->map(fn($exponent, $base) => $exponent === 1 ? $base : "{$base}^{$exponent}")->join(' \cdot ') }}
                    $</p>
                <p>The divisors of $ {{ $number }} $ are as follows:</p>
                <p>{!! collect($number->divisors())->map(fn($divisor) => '<a href="' . route('number', $divisor) . '">$ ' . $divisor . ' $</a>')->join(', ') !!}
                </p>
            @endif
        @endif
    </div>
</x-layout>
