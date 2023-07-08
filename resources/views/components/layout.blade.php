<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{ $title }} - Number Wiki</title>

    @vite('resources/css/app.css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.8/dist/katex.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.8/dist/katex.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.8/dist/contrib/auto-render.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            renderMathInElement(document.body, {
                delimiters: [{
                        left: '$$',
                        right: '$$',
                        display: true
                    },
                    {
                        left: '$',
                        right: '$',
                        display: false
                    },
                ],
            });
        });
    </script>

</head>

<body>
    <nav class="border-b border-gray-200 shadow-sm">
        <div class="p-6 mx-auto max-w-3xl flex justify-between items-center">
            <a href="{{ route('home') }}" class="font-semibold text-lg flex space-x-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-sky-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>

                <span>Number Wiki</span>
            </a>

            <div>
                <input type="text" placeholder="Type a number..."
                    class="border border-gray-200 shadow-sm px-4 py-2 focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500 rounded" />
            </div>
        </div>
    </nav>

    <div class="my-16 px-6 mx-auto max-w-3xl">
        {{ $slot }}
    </div>
</body>

</html>
