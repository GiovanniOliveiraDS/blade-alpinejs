<?php

namespace Tests\Unit\View\Components;

use Illuminate\Support\Facades\Blade;
use Tests\TestCase;

class LabelTest extends TestCase
{
    /** @test */
    public function it_should_render_the_label_text()
    {
        $html = Blade::render('<x-label label="My Label" />');

        $this->assertStringContainsString('My Label', $html);
    }

    /** @test */
    public function it_should_render_the_label_slot()
    {
        $html = Blade::render(<<<HTML
            <x-label>
                <b>My Label</b>
            </x-label>
        HTML);

        $this->assertStringContainsString('<b>My Label</b>', $html);
    }

    /** @test */
    public function it_should_render_the_error_classes()
    {
        $html = Blade::render('<x-label label="My Label" error />');

        $this->assertStringContainsString('text-red-600', $html);
    }
}
