<?php

namespace App\Macros;

class ViewMacros
{
    public function title()
    {
        return function (string $title) {
            data_set($this->livewireLayout, 'params.title', $title);

            return $this;
        };
    }
}
