<?php

namespace Tests\Unit\View\Components;

use Livewire\{Component, CreateBladeView, Livewire};
use Tests\TestCase;

class FormComponent extends Component
{
    public $attribute = null;

    public $value = null;

    public function render()
    {
        return app('view')->make(CreateBladeView::fromString(<<<HTML
            <div>
                <x-input label="My Label" hint="My Hint" name="name" />
            </div>
        HTML));
    }

    public function mockNameError(): void
    {
        $this->addError('name', 'Name is required.');
    }
}

class FormComponentAttributes extends Component
{
    public string $attribute = '';

    public $value = null;

    public function render()
    {
        return app('view')->make(CreateBladeView::fromString(<<<HTML
            <div>
                <x-input {$this->attribute}="{$this->value}" />
            </div>
        HTML));
    }

    public function setAttr(string $attribute, string $value): void
    {
        $this->attribute = $attribute;
        $this->value = $value;
    }

    public function getAttr(): string
    {
        return "{$this->attribute}={$this->value}";
    }
}

class InputTest extends TestCase
{
    /** @test */
    public function it_should_render_the_input_label()
    {
        Livewire::test(FormComponent::class)->assertSee('My Label');
    }

    /** @test */
    public function it_should_render_the_input_hint()
    {
        Livewire::test(FormComponent::class)->assertSee('My Hint');
    }

    /** @test */
    public function it_should_render_the_input_error()
    {
        Livewire::test(FormComponent::class)
            ->call('mockNameError')
            ->assertSee('Name is required.');
    }

    /** @test */
    public function it_should_hide_the_input_hint_when_it_has_error()
    {
        Livewire::test(FormComponent::class)
            ->assertSee('My Hint')
            ->assertDontSee('Name is required.')
            ->call('mockNameError')
            ->assertSee('Name is required.')
            ->assertDontSee('My Hint');
    }

    /**
     * @test
     * @dataProvider attributesProvider
     */
    public function it_should_pass_the_attributes_to_the_input(string $attribute, $value)
    {
        Livewire::test(FormComponentAttributes::class)
            ->call('setAttr', $attribute, $value)
            ->assertSee($attribute)
            ->assertSee($value);
    }

    public function attributesProvider(): array
    {
        return [
            ['wire:model', 'name'],
            ['name', 'name'],
            ['value', 'Pedro'],
            ['class', 'my-custom-class'],
            ['style', 'color: red'],
            ['id', 'name-id'],
            ['placeholder', 'Type a name'],
            ['autofocus', 'true'],
            ['disabled', 'false'],
            ['readonly', 'true'],
            ['required', 'true'],
        ];
    }
}
