@extends('layouts.base')

@section('body')
    <div class="relative grid grid-cols-12 gap-10 h-screen max-h-screen p-10 dark:bg-gray-900">
        <div class="relative col-start-1 col-end-3 flex flex-col">
            <div class="flex items-center gap-3">
                <img src="{{ asset('devsquad.svg') }}" alt="" class="h-10">
                <p class="text-xl font-semibold dark:text-gray-300">DevSquad</p>
            </div>

            <ul class="my-14 space-y-2">
                <li>
                    <a href="{{ route('home') }}"
                        class="flex items-center gap-2 {{ request()->is('/') ? 'bg-blue-50 text-blue-900 dark:bg-slate-800 dark:text-slate-200' : 'text-gray-600 dark:text-blue-400' }} cursor-pointer p-5 rounded-xl hover:bg-blue-50 dark:hover:bg-slate-700 transition duration-500">
                        <x-icons.heroicons.outline.home class="w-6 h-6" />
                        Home
                    </a>
                </li>

                <li>
                    <a href="{{ route('dark-mode') }}"
                        class="flex items-center gap-2 {{ request()->is('dark-mode') ? 'bg-blue-50 text-blue-900 dark:bg-slate-800 dark:text-slate-200' : 'text-gray-600 dark:text-blue-400' }} cursor-pointer p-5 rounded-xl hover:bg-blue-50 dark:hover:bg-slate-700 transition duration-500">
                        <x-icons.heroicons.outline.sun class="w-6 h-6" />
                        Dark Mode
                    </a>
                </li>

                <li>
                    <a href="{{ route('dark-mode') }}"
                        class="flex items-center gap-2 {{ request()->is('blade-components') ? 'bg-blue-50 text-blue-900 dark:bg-slate-800 dark:text-slate-200' : 'text-gray-600 dark:text-blue-400' }} cursor-pointer p-5 rounded-xl hover:bg-blue-50 dark:hover:bg-slate-700 transition duration-500">
                        <x-icons.heroicons.outline.code class="w-6 h-6" />
                        Blade Components
                    </a>
                </li>

                <li>
                    <a href="{{ route('alpine') }}"
                        class="flex items-center gap-2 {{ request()->is('alpine') ? 'bg-blue-50 text-blue-900 dark:bg-slate-800 dark:text-slate-200' : 'text-gray-600 dark:text-blue-400' }} cursor-pointer p-5 rounded-xl hover:bg-blue-50 dark:hover:bg-slate-700 transition duration-500">
                        <x-icons.heroicons.outline.desktop-computer class="w-6 h-6" />
                        Alpine Components
                    </a>
                </li>
            </ul>

            <div class="mt-auto">
                <hr class="mb-6" />

                <a x-data="gitHubIcon" x-on:mouseover="play()" x-on:mouseleave="stop()"
                    href="https://github.com/GiovanniOliveiraDS/blade-alpinejs" target="_blank"
                    class="bg-gray-100 dark:bg-gray-800 text-gray-500 dark:text-gray-400 px-3 py-2 rounded-xl flex items-center">
                    <div id="githubIcon" class="w-12 h-12"></div>
                    Github
                </a>
            </div>
        </div>

        <div class="col-start-3 col-end-11 rounded-3xl overflow-y-scroll min-h-full bg-blue-50 dark:bg-slate-800">
            @yield('content')

            @isset($slot)
                {{ $slot }}
            @endisset
        </div>

        <div class="relative col-start-11 col-end-13 flex flex-col">
            <h1 class="text-lg text-gray-600 dark:text-gray-100">
                Useful Links
            </h1>

            <div class="mt-8 w-full space-y-3">
                <a href="https://laravel.com/" target="_blank"
                    class="flex w-full gap-3 items-center p-5 border border-gray-300 rounded-xl text-gray-600 dark:text-gray-100 transition duration-500 hover:bg-yellow-400 dark:hover:text-gray-800">
                    <img src="{{ asset('laravel.png') }}" alt="" class="w-6 h-6">
                    Laravel
                </a>
                <a href="https://laravel-livewire.com/" target="_blank"
                    class="flex w-full gap-3 items-center p-5 border border-gray-300 rounded-xl text-gray-600 dark:text-gray-100 transition duration-500 hover:bg-yellow-400 dark:hover:text-gray-800">
                    <img src="{{ asset('livewire.svg') }}" alt="" class="w-6 h-6">
                    Livewire
                </a>
                <a href="https://alpinejs.dev/" target="_blank"
                    class="flex w-full gap-3 items-center p-5 border border-gray-300 rounded-xl text-gray-600 dark:text-gray-100 transition duration-500 hover:bg-yellow-400 dark:hover:text-gray-800">
                    <img src="{{ asset('alpinejs.svg') }}" alt="" class="w-6 h-6">
                    Alpine JS
                </a>
                <a href="https://tailwindcss.com/" target="_blank"
                    class="flex w-full gap-3 items-center p-5 border border-gray-300 rounded-xl text-gray-600 dark:text-gray-100 transition duration-500 hover:bg-yellow-400 dark:hover:text-gray-800">
                    <img src="{{ asset('tailwind.png') }}" alt="" class="w-6 h-6">
                    Tailwind CSS
                </a>
            </div>

            <div class="mt-auto flex justify-end items-end gap-3 text-blue-900 dark:text-blue-50">
                Made with ❤️ by
                <img src="{{ asset('pedro-oliveira.jpeg') }}" alt="" class="w-10 h-10 rounded-lg">
                <img src="{{ asset('giovanni-oliveira.png') }}" alt="" class="w-10 h-10 rounded-lg">
            </div>
        </div>
    </div>
@endsection
