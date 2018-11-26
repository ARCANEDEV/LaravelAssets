<?php namespace Arcanedev\Assets\Console;

use Arcanedev\Assets\Exceptions\NotInitiatedException;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Console\Command as BaseCommand;
use Illuminate\Support\Facades\File;

/**
 * Class     Command
 *
 * @package  Arcanedev\Assets\Console
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @property  \Illuminate\Foundation\Application  $laravel
 */
abstract class Command extends BaseCommand
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    abstract public function handle();

    /* -----------------------------------------------------------------
     |  Common Methods
     | -----------------------------------------------------------------
     */

    /**
     * Create a new pipeline.
     *
     * @return \Illuminate\Pipeline\Pipeline
     */
    protected function pipeline()
    {
        return new Pipeline($this->laravel);
    }

    /**
     * Get the passable for the pipeline.
     *
     * @return array
     */
    protected function getPassable()
    {
        return [
            'root-directory'   => config('assets.root-directory', 'assets'),
            'root-package'     => config('assets.root-package', 'assets'),
            'public-directory' => config('assets.public-directory', 'public'),
        ];
    }

    /**
     * Check if the assets was initiated.
     */
    protected function ensureIsInitiated()
    {
        if ( ! File::isDirectory(config('assets.root-directory')))
            NotInitiatedException::throw();
    }
}
