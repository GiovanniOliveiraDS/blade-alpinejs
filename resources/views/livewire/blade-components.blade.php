<div>
    <!-- Without Error -->
    <div class="grid grid-cols-3 gap-5 px-8 py-5">
        <div class="card">
            <b>Input</b>

            <div class="border border-gray-200 mt-2 mb-3"></div>

            <x-input name="foo1" placeholder="DevSquad Workshop" />
        </div>

        <div class="card">
            <b>Input + Label</b>

            <div class="border border-gray-200 mt-2 mb-3"></div>

            <x-input name="foo2" placeholder="DevSquad Workshop" label="Without Error" />
        </div>

        <div class="card">
            <b>Input + Label + Hint</b>

            <div class="border border-gray-200 mt-2 mb-3"></div>

            <x-input name="foo3" placeholder="DevSquad Workshop" label="Without Error" hint="We'll only use this for spam." />
        </div>
    </div>

    <!-- With Error -->
    <div class="grid grid-cols-3 gap-5 px-8 pb-5">
        <div class="card">
            <b>Input</b>

            <div class="border border-gray-200 mt-2 mb-3"></div>

            <x-input placeholder="DevSquad Workshop" name="name" />
        </div>

        <div class="card">
            <b>Input + Label</b>

            <div class="border border-gray-200 mt-2 mb-3"></div>

            <x-input placeholder="DevSquad Workshop" name="name2" label="Without Error" />
        </div>

        <div class="card">
            <b>Input + Label + Hint</b>

            <div class="border border-gray-200 mt-2 mb-3"></div>

            <x-input name="name3" label="Without Error" placeholder="DevSquad Workshop" hint="We'll only use this for spam." />
        </div>
    </div>

    <div class="card max-w-lg mx-auto">
        <b wire:click="$refresh">Input + Label + WireModel</b>

        <div class="border border-gray-200 mt-2 mb-3"></div>

        Model: {{ $model }}

        <br />
        <br />

        <x-input wire:model="model" label="Without Error" placeholder="DevSquad Workshop" />
    </div>
</div>
