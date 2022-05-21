@extends('layouts.app')

@section('content')
    <div class="flex flex-col p-10">
        <h1 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Alpine Components
        </h1>

        <section class="my-10">
            <h2 class="text-lg text-gray-700 dark:text-gray-200 mb-3">Toast</h2>

            <div class="space-x-2">
                <button class="bg-green-300 p-3 rounded-lg text-green-900 transform transition duration-500 hover:scale-110"
                    x-on:click="$dispatch('notice',
                    {
                        type: 'success',
                        title: 'Success!',
                        text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus facilisis tristique. Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                    })"
                >
                    Success
                </button>
                <button class="bg-blue-300 p-3 rounded-lg text-blue-900 transform transition duration-500 hover:scale-110"
                    x-on:click="$dispatch('notice',
                    {
                        type: 'info',
                        title: 'Info!',
                        text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus facilisis tristique. Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                    })"
                >
                    Info
                </button>
                <button class="bg-yellow-300 p-3 rounded-lg text-yellow-900 transform transition duration-500 hover:scale-110"
                    x-on:click="$dispatch('notice',
                    {
                        type: 'warning',
                        title: 'Warning!',
                        text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus facilisis tristique. Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                    })"
                >
                    Warning
                </button>
                <button class="bg-red-300 p-3 rounded-lg text-red-900 transform transition duration-500 hover:scale-110"
                    x-on:click="$dispatch('notice',
                    {
                        type: 'error',
                        title: 'Error!',
                        text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus facilisis tristique. Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                    })"
                >
                    Error
                </button>
            </div>
        </section>

    </div>
@endsection
