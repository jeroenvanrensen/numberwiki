<x-layout :title="$number->number">
    <div class="grid grid-cols-3 gap-16">
        <div class="col-span-2 typography">
            <h1>$ {{ $number->number }} $</h1>

            <p>
                @if ($number->number === 0)
                    $ {{ $number->number }} $ ({{ $number->name() }}) is the number preceding
                    <a href="{{ route('number', $number->successor()) }}">$ {{ $number->successor() }} $</a>. Since it is
                    the
                    smallest natural number, it does not have a predecessor.
                @else
                    $ {{ $number->number }} $ ({{ $number->name() }}) is the number succeeding <a
                        href="{{ route('number', $number->predecessor()) }}">$
                        {{ $number->predecessor() }} $</a> and preceding
                    <a href="{{ route('number', $number->successor()) }}">$ {{ $number->successor() }} $</a>.
                @endif
            </p>

            @if ($number != '0' && $number != '1')
                @if ($number->isPrime())
                    <h2 id="prime">Prime</h2>
                    <p>The number $ {{ $number }} $ is a <em>prime number</em>, which means that its only
                        divisors
                        are itself
                        and $ 1 $.
                    </p>
                @else
                    <h2 id="prime">Composite</h2>
                    <p>The number $ {{ $number }} $ is a <em>composite number</em>, which means that it is not
                        prime
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

            <h2 id="representations">Representations</h2>

            <p>The number $ {{ $number }} $ can be written in number bases other than base-10. The table below
                shows
                all representations until base-16.</p>

            <table class="w-full">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left border border-gray-200 bg-gray-50">Base</th>
                        <th class="px-6 py-3 text-left border border-gray-200 bg-gray-50">Number</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 2; $i <= 16; $i++)
                        <tr>
                            <td class="px-6 py-3 border border-gray-200">Base-{{ $i }}</td>
                            <td class="px-6 py-3 font-mono border border-gray-200">{{ $number->base($i) }}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>

        <div class="col-span-1">
            <div class="sticky border border-gray-200 rounded shadow top-16">
                @if ($number->number > 2)
                    <figure class="mb-12">
                        <div class="w-[200px] mt-8 mb-2 mx-auto">{!! $number->polygon() !!}</div>
                        <figcaption class="text-xs italic text-center">A regular {{ $number }}-sided polygon
                        </figcaption>
                    </figure>
                @endif

                <h2 class="mt-6 mb-3 text-lg font-bold text-center">Table of Contents</h2>

                <ul class="mb-6 text-center">
                    <li><a href="#prime">{{ $number->isPrime() ? 'Prime' : 'Composite' }}</a></li>
                    <li><a href="#representations">Representations</a></li>
                </ul>
            </div>
        </div>
    </div>
</x-layout>
