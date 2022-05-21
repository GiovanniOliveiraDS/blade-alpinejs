@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center h-full">
        <h1 class="text-4xl font-semibold dark:text-gray-200">Dark Mode Switch</h1>
        <div
            x-data="darkSwitch('darkSwitch')"
            id="darkSwitch"
            x-on:click="toggle()"
            class="cursor-pointer w-96"
        >
        </div>
    </div>
@endsection
