<?php namespace Arcanedev\Assets\Console;

use Arcanedev\Assets\Exceptions\NotInitiatedException;
use Arcanedev\Assets\Helpers\Workspaces;
use Illuminate\Console\Command as BaseCommand;
use Illuminate\Pipeline\Pipeline;

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
        $default   = $this->getSelectedWorkspace();
        $workspace = Workspaces::get($default);

        return array_merge(
            $workspace,
            [
                'workspace' => $default,
                'public-directory' => config('assets.public-directory', 'public'),
            ]
        );
    }

    /**
     * Check if the assets was initiated.
     */
    protected function ensureIsInitiated()
    {
        $default = $this->getSelectedWorkspace();

        if ( ! Workspaces::rootDirectoryExists($default))
            NotInitiatedException::throw();
    }

    /**
     * Get the default workspace.
     *
     * @return \Illuminate\Config\Repository|mixed
     */
    protected function getSelectedWorkspace()
    {
        return $this->option('workspace') ?: Workspaces::getDefaultName();
    }
}
