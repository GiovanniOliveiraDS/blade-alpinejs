<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Playground extends Component
{
    public $variable;
    public $test;

    public function callToast()
    {
        $this->dispatchBrowserEvent('notice', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus facilisis tristique. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        ]);
    }

    public function render()
    {
        return view('livewire.playground');
    }
}
