<?php namespace Bantenprov\RekapitulasiPengadaan;

use Illuminate\Support\ServiceProvider;
use Bantenprov\RekapitulasiPengadaan\Console\Commands\RekapitulasiPengadaanCommand;

/**
 * The RekapitulasiPengadaanServiceProvider class
 *
 * @package Bantenprov\RekapitulasiPengadaan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RekapitulasiPengadaanServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Bootstrap handles
        $this->routeHandle();
        $this->configHandle();
        $this->langHandle();
        $this->viewHandle();
        $this->assetHandle();
        $this->migrationHandle();
        $this->publicHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('rekapitulasi-pengadaan', function ($app) {
            return new RekapitulasiPengadaan;
        });

        $this->app->singleton('command.rekapitulasi-pengadaan', function ($app) {
            return new RekapitulasiPengadaanCommand;
        });

        $this->commands('command.rekapitulasi-pengadaan');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'rekapitulasi-pengadaan',
            'command.rekapitulasi-pengadaan',
        ];
    }

    /**
     * Loading package routes
     *
     * @return void
     */
    protected function routeHandle()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
    }

    /**
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/config/config.php';
        $appConfigPath     = config_path('rekapitulasi-pengadaan.php');

        $this->mergeConfigFrom($packageConfigPath, 'rekapitulasi-pengadaan');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'config');
    }

    /**
     * Loading and publishing package's translations
     *
     * @return void
     */
    protected function langHandle()
    {
        $packageTranslationsPath = __DIR__.'/resources/lang';

        $this->loadTranslationsFrom($packageTranslationsPath, 'rekapitulasi-pengadaan');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/rekapitulasi-pengadaan'),
        ], 'lang');
    }

    /**
     * Loading and publishing package's views
     *
     * @return void
     */
    protected function viewHandle()
    {
        $packageViewsPath = __DIR__.'/resources/views';

        $this->loadViewsFrom($packageViewsPath, 'rekapitulasi-pengadaan');

        $this->publishes([
            $packageViewsPath => resource_path('views/vendor/rekapitulasi-pengadaan'),
        ], 'views');
    }

    /**
     * Publishing package's assets (JavaScript, CSS, images...)
     *
     * @return void
     */
    protected function assetHandle()
    {
        $packageAssetsPath = __DIR__.'/resources/assets';

        $this->publishes([
            $packageAssetsPath => resource_path('assets'),
        ], 'rekapitulasi-pengadaan-assets');
    }

    /**
     * Publishing package's migrations
     *
     * @return void
     */
    protected function migrationHandle()
    {
        $packageMigrationsPath = __DIR__.'/database/migrations';

        $this->loadMigrationsFrom($packageMigrationsPath);

        $this->publishes([
            $packageMigrationsPath => database_path('migrations')
        ], 'migrations');
    }

    public function publicHandle()
    {
        $packagePublicPath = __DIR__.'/public';

        $this->publishes([
            $packagePublicPath => base_path('public')
        ], 'rekapitulasi-pengadaan-public');
    }
}
