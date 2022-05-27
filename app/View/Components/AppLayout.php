<?php

namespace App\View\Components;

class AppLayout extends BaseLayout
{
    public array $routes = [
        [
            'name'  => 'home',
            'label' => 'Home',
            'icon'  => 'icons.heroicons.outline.home'
        ],
        [
            'name'  => 'dark-mode',
            'label' => 'Dark Mode',
            'icon'  => 'icons.heroicons.outline.sun'
        ],
        [
            'name'  => 'blade-components',
            'label' => 'Blade Components',
            'icon'  => 'icons.heroicons.outline.code'
        ],
        [
            'name'  => 'alpine',
            'label' => 'Alpine Components',
            'icon'  => 'icons.heroicons.outline.desktop-computer'
        ],
    ];

    public array $links = [
        [
            'label' => 'Laravel',
            'url'   => 'https://laravel.com',
            'img'   => 'laravel.png',
        ],
        [
            'label' => 'Livewire',
            'url'   => 'https://laravel-livewire.com',
            'img'   => 'livewire.svg',
        ],
        [
            'label' => 'Alpine JS',
            'url'   => 'https://alpinejs.dev',
            'img'   => 'alpinejs.svg',
        ],
        [
            'label' => 'Tailwind CSS',
            'url'   => 'https://tailwindcss.com',
            'img'   => 'tailwind.png',
        ]
    ];

    public function render()
    {
        return view('layouts.app');
    }
}
