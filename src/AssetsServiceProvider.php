<?php namespace Arcanedev\Assets;

use Arcanedev\Support\PackageServiceProvider;

/**
 * Class     AssetsServiceProvider
 *
 * @package  Arcanedev\Assets
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class AssetsServiceProvider extends PackageServiceProvider
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    protected $package = 'assets';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Register the service provider.
     */
    public function register()
    {
        parent::register();

        $this->registerConfig();

        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\InitCommand::class,
                Console\MakeCommand::class,
            ]);
        }
    }

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        $this->publishConfig();
    }
}
