<x-app-layout title="Alpine JS">
    <div class="flex flex-col p-10">
        <h1 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Alpine Components
        </h1>

        <section class="my-10">
            <h2 class="text-lg text-gray-700 dark:text-gray-200 mb-3">Toast</h2>

            <div class="space-x-2" x-data="{ anm: false }">
                <button
                    class="bg-green-300 p-3 rounded-lg text-green-900 transform transition duration-500 hover:scale-110 hover:shadow-xl"
                    x-on:click="$dispatch('notice',
                            {
                                type: 'success',
                                title: 'Success!',
                                text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus facilisis tristique. Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                            })">
                    Success
                </button>
                <button
                    class="bg-blue-300 p-3 rounded-lg text-blue-900 transform transition duration-500 hover:scale-110 hover:shadow-xl"
                    x-on:click="$dispatch('notice',
                            {
                                type: 'info',
                                title: 'Info!',
                                text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus facilisis tristique. Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                            })">
                    Info
                </button>
                <button
                    class="bg-yellow-300 p-3 rounded-lg text-yellow-900 transform transition duration-500 hover:scale-110 hover:shadow-xl"
                    x-on:click="$dispatch('notice',
                            {
                                type: 'warning',
                                title: 'Warning!',
                                text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus facilisis tristique. Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                            })">
                    Warning
                </button>
                <button
                    class="bg-red-300 p-3 rounded-lg text-red-900 transform transition duration-500 hover:scale-110 hover:shadow-xl"
                    x-on:click="$dispatch('notice',
                            {
                                type: 'error',
                                title: 'Error!',
                                text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus facilisis tristique. Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                            })">
                    Error
                </button>

                <button
                    class="bg-cyan-300 p-3 rounded-lg text-cyan-900 transform transition duration-500 hover:scale-110 hover:shadow-xl"
                    x-on:click="let audio = new Audio('{{ asset('toasty.mp3') }}'); audio.play(); anm = true; setTimeout(() => anm = false, 800)">
                    Toasty!
                </button>

                <img x-show="anm" x-transition:enter="transition ease-out duration-100 origin-right"
                    x-transition:enter-start="translate-x-6" x-transition:enter-end="translate-x-0"
                    x-transition:leave="transition ease-in duration-100 origin-right"
                    x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-6"
                    src="{{ asset('toasty.png') }}" alt="" class="fixed w-20 bottom-28 right-0 rounded">
            </div>
        </section>

        <section id="inputs" class="mb-5">
            <h2 class="text-lg text-gray-700 dark:text-gray-200 mb-3">Input Mask</h2>

            <div class="grid grid-cols-2 gap-4">
                <x-input x-mask.money placeholder="1,000.0" label="Money"/>
                <x-input x-mask.date :placeholder="now()->format('d/m/Y')" label="Date"/>
                <x-input x-mask.letters placeholder="I am a Letter" label="Only Letters"/>
                <x-input x-mask.numbers placeholder="1234567890" label="Only Numbers"/>
                <x-input x-mask.phone placeholder="(84) 98483-8128" label="Phone Number"/>
            </div>
        </section>

        <section id="date-picker" class="mb-5">
            <h2 class="text-lg text-gray-700 dark:text-gray-200 mb-3">Date Picker</h2>

            <div class="grid grid-cols-2 gap-4">
                <x-date-picker wire:model="datePicker" label="Date Picker" />
                <x-date-picker :time="true" wire:model="datePicker" label="Date and Time Picker" />
            </div>
        </section>
    </div>
</x-app-layout>
