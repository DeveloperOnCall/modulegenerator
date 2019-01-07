<?php

namespace DeveloperOnCall\ModuleGenerator;

use Illuminate\Support\ServiceProvider;

class ModuleGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/modulegenerator.php' => config_path('modulegenerator.php'),
        ]);

        $this->publishes([
            __DIR__ . '/stubs/' => base_path('resources/module-generator/'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(
            'DeveloperOnCall\ModuleGenerator\Commands\ModuleGeneratorCommand',
            'DeveloperOnCall\ModuleGenerator\Commands\ModuleGeneratorControllerCommand',
            'DeveloperOnCall\ModuleGenerator\Commands\ModuleGeneratorModelCommand',
            'DeveloperOnCall\ModuleGenerator\Commands\ModuleGeneratorMigrationCommand',
            'DeveloperOnCall\ModuleGenerator\Commands\ModuleGeneratorViewCommand',
            'DeveloperOnCall\ModuleGenerator\Commands\ModuleGeneratorLangCommand',
            'DeveloperOnCall\ModuleGenerator\Commands\ModuleGeneratorApiCommand',
            'DeveloperOnCall\ModuleGenerator\Commands\ModuleGeneratorApiControllerCommand'
        );
    }
}
