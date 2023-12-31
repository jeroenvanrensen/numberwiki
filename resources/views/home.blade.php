<x-layout title="Home">
    <div class="bg-gradient-to-bl from-blue-300 via-white to-white">
        <nav>
            <div class="max-w-5xl p-6 mx-auto">
                <a href="{{ route('home') }}" class="flex items-center space-x-2 text-lg font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-blue-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>

                    <span>Number Wiki</span>
                </a>
            </div>
        </nav>

        <div class="flex flex-col justify-center min-h-[calc(100vh-77px)] px-6 max-w-5xl mx-auto">
            <h2 class="mb-4 text-4xl font-bold text-blue-600 md:mb-2 sm:mb-0 md:text-3xl sm:text-2xl">Interesting facts
                about</h2>
            <h1 class="mb-8 text-6xl font-bold lg:text-5xl md:text-4xl">Any number</h1>
            <p class="max-w-md mb-8 text-xl text-gray-800 md:text-lg sm:text-base"><em>NumberWiki</em> is a website that
                has interesting and
                surprising facts
                about any
                number!</p>

            <form action="{{ route('home') }}" method="get">
                <input autofocus name="number" type="text" placeholder="Type a number..."
                    class="w-full max-w-md px-6 py-3 text-lg border border-gray-300 rounded shadow-sm md:px-4 md:py-2 md:text-base focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" />
            </form>
        </div>
    </div>
</x-layout>
