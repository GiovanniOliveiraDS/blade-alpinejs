<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BladeComponents extends Component
{
    public ?string $model = null;

    public function render()
    {
        $this->addError('name', 'Name is required.');
        $this->addError('name2', 'Name is required.');
        $this->addError('name3', 'Name is required.');

        return view('livewire.blade-components');
    }
}
