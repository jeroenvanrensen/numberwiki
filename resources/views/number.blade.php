<x-layout :title="$number->number">
    <nav class="border-b border-gray-200 shadow-sm">
        <div class="flex items-center justify-between max-w-5xl p-6 mx-auto md:flex-col">
            <a href="{{ route('home') }}" class="flex items-center space-x-2 text-lg font-semibold md:mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-blue-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>

                <span>Number Wiki</span>
            </a>

            <div>
                <form action="{{ route('home') }}" method="get">
                    <input name="number" type="text" placeholder="Type a number..."
                        class="px-4 py-2 border border-gray-200 rounded shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" />
                </form>
            </div>
        </div>
    </nav>

    <div class="max-w-5xl px-6 mx-auto my-16 lg:my-10 md:my-6">
        <div class="grid grid-cols-3 gap-16 md:gap-6 md:grid-cols-1">
            <div class="col-span-2 md:col-span-1 typography">
                <h1>$ {{ $number->number }} $</h1>

                <p>
                    @if ($number->number === 0)
                        $ {{ $number->number }} $ ({{ $number->name() }}) is the number preceding
                        <a href="{{ route('number', $number->successor()) }}">$ {{ $number->successor() }} $</a>. Since
                        it is
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
                        <p>The number $ {{ $number }} $ is a <em>composite number</em>, which means that it is
                            not
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

                <p>The number $ {{ $number }} $ can be written in number bases other than base-10. The table
                    below
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

                @if ($number != '0' && $number != '1')
                    <h2 id="collatz">Collatz sequence</h2>

                    <p>Given is the function $ f(n) = \frac{1}{2}n $ for
                        even $ n $ and $ f(n) = 3n + 1 $ for odd $ n $.</p>

                    <p>The <em>Collatz conjecture</em> states that for every integer, after enough iterations of $ f $,
                        the
                        result will eventually be $ 1 $.</p>

                    <p>Although still unproven, the conjecture is true for $ {{ $number }} $ and its sequence is
                        as
                        follows:</p>

                    <p>{!! collect($number->collatz())->map(fn($n) => '<a href="' . route('number', $n) . '">$' . $n . '$</a>')->join(' → ') !!}
                    </p>
                @endif
            </div>

            <div class="col-span-1 md:order-[-1] w-full">
                <div class="sticky w-full border border-gray-200 rounded shadow md:mb-6 md:relative md:top-0 top-16">
                    @if ($number->number > 2)
                        <figure class="mb-12">
                            <div class="w-[200px] mt-8 mb-2 mx-auto">{!! $number->polygon() !!}</div>
                            <figcaption class="text-xs italic text-center">A regular {{ $number }}-sided polygon
                            </figcaption>
                        </figure>
                    @endif

                    <h2 class="mt-6 mb-3 text-lg font-bold text-center">Table of Contents</h2>

                    <ul class="mb-6 text-center">
                        @if ($number != '0' && $number != '1')
                            <li><a class="hover:underline"
                                    href="#prime">{{ $number->isPrime() ? 'Prime' : 'Composite' }}</a></li>
                        @endif
                        <li><a class="hover:underline" href="#representations">Representations</a>
                        </li>
                        @if ($number != '0' && $number != '1')
                            <li><a class="hover:underline" href="#collatz">Collatz sequence</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-10 border-t border-gray-200 shadow-sm md:py-6">
        <div class="max-w-5xl px-6 mx-auto">
            <p>Copyright &copy; {{ date('Y') }} by <a class="underline" href="https://www.jeroenvanrensen.nl/">
                    Jeroen
                    van Rensen</a>.</p>
        </div>
    </footer>
</x-layout>
