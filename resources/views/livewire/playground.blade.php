<div x-data="playground(@entangle('test'))" class="relative">
    <div class="grid grid-cols-2 gap-4 my-4">
        <div>
            <button class="bg-cyan-300 p-3 rounded-lg text-cyan-900 transform transition duration-500 hover:scale-110 hover:shadow-xl"
                x-on:click="sendVariableToLivewire('This is a test')"
            >
                Send variable to Livewire
            </button>

            <x-input wire:model="variable" class="mt-4"/>
        </div>

        <div class="w-full flex">
            <button class="bg-cyan-300 p-3 rounded-lg text-cyan-900 transform transition duration-500 hover:scale-110 hover:shadow-xl w-full"
                x-on:click="callToastFromLivewire()"
            >
                Call Toast
            </button>
        </div>
        <x-input x-model="modelFromAlpine" :hint="$test" label="With x-model"/>
        <x-input wire:model="test" :hint="$test" label="With wire:model"/>
    </div>
</div>
