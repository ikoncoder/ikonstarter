<?php

namespace Ikoncoder\Ikonstarter;

use Illuminate\Support\ServiceProvider;
use Ikoncoder\Ikonstarter\Console\InstallCommand;

class IkonstarterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCommands(); 
        //config
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'ikonadmin');
    }

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
     * Register the Invoices Artisan commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}