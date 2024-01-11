<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ Config('add.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-orange-50">
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/post') }}"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">posts</a>
            @else
                <a href="{{ route('login') }}"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                    in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif
    {{-- hero section --}}
    <div class=" bg-orange-100">

        <div class="flex justify-around container mx-auto">

            <div class="flex flex-col justify-center p-16">

                <div class="text-7xl text-lime-700 ">Join BookDays</div>

                <div class="mt-20">

                    <a href="{{ route('register') }}"

                        class="px-10 py-5 text-2xl rounded-xl font-semibold bg-lime-400 text-lime-800 hover:bg-lime-500 hover:text-lime-900">

                        Create Yor Blog

                    </a>

                </div>

            </div>

            <div>

                <x-home.hero-illustration class="w-[50rem] h-[50rem] -mb-32" />

            </div>

        </div>

    </div>
    {{-- end hero section --}}

    {{--  Latest Posts  --}}
    <x-home.section title="Latest Posts">
        <div class="flex mb-3 ml-3 mr-3 mt-16 gap-12">
            @foreach($latestPosts as $post)
             <x-widgets.post-card :$post/>
            @endforeach
       </div>
    </x-home.section>
    {{--  End Latest Posts  --}}



</body>

</html>
