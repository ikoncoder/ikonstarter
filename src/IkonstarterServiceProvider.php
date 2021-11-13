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
       // $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'ikonadmin');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/ikonadmin.php' => config_path('ikonadmin.php'),
            ], 'config');

            // $this->commands([
            //     InstallBlogPackage::class,
            // ]);

            if (! class_exists('CreatePostsTable')) {
                $this->publishes([
                    __DIR__ . '/../../database/migrations/create_posts_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_posts_table.php'),
                    // you can add any number of migrations here
                ], 'migrations');
            }

            if (! class_exists('PostFactory')) {
                $this->publishes([
                    __DIR__ . '/../../database/factories/PostFactory.php' => database_path('factories/PostFactory.php'),
                    // you can add any number of migrations here
                ], 'factories');
            }

            if (! class_exists('PostFactory')) {
                $this->publishes([
                    __DIR__ . '/../../database/factories/PostFactory.php' => database_path('factories/PostFactory.php'),
                    // you can add any number of migrations here
                ]);
            }

            $this->publishes([
                __DIR__.'/../models/Post.php' => app_path('app/Models/Post.php'),
            ]);

            // $this->publishes([
            //     __DIR__.'/../resources/assets' => public_path('blogpackage'),
            // ], 'assets');
        }
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