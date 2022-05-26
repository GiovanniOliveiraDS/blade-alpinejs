<div>
    <!-- Without Error -->
    <div class="grid grid-cols-3 gap-5 p-6">
        <div class="card">
            <b>Input</b>

            <div class="border border-gray-200 mt-2 mb-3"></div>

            <x-input />
        </div>

        <div class="card">
            <b>Input + Label</b>

            <div class="border border-gray-200 mt-2 mb-3"></div>

            <x-input label="Without Error" />
        </div>

        <div class="card">
            <b>Input + Label + Hint</b>

            <div class="border border-gray-200 mt-2 mb-3"></div>

            <x-input label="Without Error" hint="We'll only use this for spam." />
        </div>
    </div>

    <!-- With Error -->
    <div class="grid grid-cols-3 gap-5 p-6">
        <div class="card">
            <b>Input</b>

            <div class="border border-gray-200 mt-2 mb-3"></div>

            <x-input name="name" />
        </div>

        <div class="card">
            <b>Input + Label</b>

            <div class="border border-gray-200 mt-2 mb-3"></div>

            <x-input name="name2" label="Without Error" />
        </div>

        <div class="card">
            <b>Input + Label + Hint</b>

            <div class="border border-gray-200 mt-2 mb-3"></div>

            <x-input name="name3" label="Without Error" hint="We'll only use this for spam." />
        </div>
    </div>

    <div class="card max-w-md mx-auto">
        <b wire:click="$refresh">Input + Label + WireModel</b>

        <div class="border border-gray-200 mt-2 mb-3"></div>

        Model: {{ $model }}

        <br/>
        <br/>

        <x-input wire:model="model" label="Without Error" hint="We'll only use this for spam." />
    </div>
</div>
