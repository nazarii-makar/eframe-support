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
     * @var array
     */
    protected $configs = [];

    /**
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);

        $this->registerConfigs();
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

    /**
     * Register configs
     */
    protected function registerConfigs()
    {
        foreach ($this->configs as $config) {
            $path = realpath(__DIR__ . "/../../config/{$config}.php");
            $this->mergeConfigFrom($path, $config);
        }
    }
}