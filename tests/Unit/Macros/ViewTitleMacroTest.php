<?php

namespace Tests\Unit\Macros;

use Illuminate\Support\Facades\Route;
use Livewire\{Component, CreateBladeView, Livewire};
use Tests\TestCase;

class ViewTitleMacroTest extends TestCase
{
    /** @test */
    public function it_should_render_title_inside_layout()
    {
        Livewire::component(TitledComponent::class);

        Route::get('/foo', TitledComponent::class);

        $this->get('/foo')
            ->assertSee('My Title')
            ->assertSee('Titled Component')
            ->assertDontSee('Without Title');
    }
}

class TitledComponent extends Component
{
    public function render()
    {
        return app('view')
            ->make(CreateBladeView::fromString('<div>Titled Component</div>'))
            ->layout('layouts.base')
            ->title('My Title');
    }
}
