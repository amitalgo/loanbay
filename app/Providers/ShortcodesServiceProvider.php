<?php

namespace App\Providers;

use App\Shortcodes\DynamicShortcode;
use Illuminate\Support\ServiceProvider;
use Shortcode;
use App\Shortcodes\BoldShortcode;

class ShortcodesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Shortcode::register('b', BoldShortcode::class);
        Shortcode::register('i', 'App\Shortcodes\ItalicShortcode@custom');
        Shortcode::register('shortcode',DynamicShortcode::class);
    }
}
