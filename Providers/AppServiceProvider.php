<?php

namespace EFrame\Support\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

/**
 * Class AppServiceProvider
 * @package EFrame\Support\Providers
 */
abstract class AppServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $morph_map = [];

    /**
     * @var array
     */
    protected $commands = [];

    /**
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }

    /**
     * @return void
     */
    public function boot()
    {
        $this->registerMorphMap();
    }

    /**
     * Register Morph Map
     */
    protected function registerMorphMap()
    {
        Relation::morphMap($this->morph_map);
    }
}