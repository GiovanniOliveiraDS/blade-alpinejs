@php
    $notice = session('notice');
@endphp

<div
    @if($notice)
        x-init="add(@js($notice))"
    @endif
	x-data="toast"
	x-on:notice.window="add($event.detail)"
	class="fixed flex w-screen h-screen top-0 bottom-0 right-0 left-0 z-50 flex-col justify-start items-end p-4"
	style="pointer-events:none"
>

	<template x-for="notice of notices" :key="notice.id">
        <div
            x-on:mouseover="notice.hovered = true;"
            x-on:mouseleave="notice.hovered = false; renewTimer(notice.id)"
			x-show="visible.includes(notice)"
			x-transition:enter="transition ease-out duration-500 origin-right"
            x-transition:enter-start="opacity-0 translate-x-6"
            x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition ease-in duration-500 origin-right"
            x-transition:leave-start="opacity-100 translate-x-0"
            x-transition:leave-end="opacity-0 translate-x-6"
			x-bind:class="{
				'bg-green-50': notice.type === 'success',
				'bg-blue-50': notice.type === 'info',
				'bg-yellow-50': notice.type === 'warning',
				'bg-red-50': notice.type === 'error',
			 }"
            class="rounded-lg p-4 mr-6 my-2 shadow-2xl pointer-events-auto w-96"
        >
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <x-icons.heroicons.solid.check-circle
                        x-show="notice.type === 'success'"
                        class="h-5 w-5 text-green-400"
                    />
                    <x-icons.heroicons.solid.information-circle
                        x-show="notice.type === 'info'"
                        class="h-5 w-5 text-blue-400"
                    />
                    <x-icons.heroicons.solid.exclamation
                        x-show="notice.type === 'warning'"
                        class="h-5 w-5 text-yellow-400"
                    />
                    <x-icons.heroicons.solid.x-circle
                        x-show="notice.type === 'error'"
                        class="h-5 w-5 text-red-400"
                    />
                </div>
                <div class="ml-3">
                    <p
                        x-text="notice.title"
                        x-bind:class="{
                            'text-green-800': notice.type === 'success',
                            'text-blue-800': notice.type === 'info',
                            'text-yellow-800': notice.type === 'warning',
                            'text-red-800': notice.type === 'error',
                        }"
                        class="text-sm font-medium"
                    ></p>
                    <p
                        x-text="notice.text"
                        x-bind:class="{
                            'text-green-800': notice.type === 'success',
                            'text-blue-800': notice.type === 'info',
                            'text-yellow-800': notice.type === 'warning',
                            'text-red-800': notice.type === 'error',
                        }"
                        class="text-sm font-light"
                    ></p>
                </div>
                <div class="ml-auto pl-3">
                    <div class="-mx-1.5 -my-1.5">
                        <button
                            type="button"
                            x-on:click="remove(notice.id)"
                            x-bind:class="{
                                'bg-green-50 text-green-500 hover:bg-green-100 focus:ring-offset-green-50 focus:ring-green-600': notice.type === 'success',
                                'bg-blue-50 text-blue-500 hover:bg-blue-100 focus:ring-offset-blue-50 focus:ring-blue-600': notice.type === 'info',
                                'bg-yellow-50 text-yellow-500 hover:bg-yellow-100 focus:ring-offset-yellow-50 focus:ring-yellow-600': notice.type === 'warning',
                                'bg-red-50 text-red-500 hover:bg-red-100 focus:ring-offset-red-50 focus:ring-red-600': notice.type === 'error',
                            }"
                            class="inline-flex rounded-md p-1.5  focus:outline-none focus:ring-2 focus:ring-offset-2"
                        >
                            <span class="sr-only">Remover</span>
                            <x-icons.heroicons.solid.x class="h-5 w-5" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
	</template>
</div>
