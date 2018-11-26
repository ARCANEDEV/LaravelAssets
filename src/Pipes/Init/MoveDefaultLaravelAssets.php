<?php namespace Arcanedev\Assets\Pipes\Init;

use Closure;
use Illuminate\Support\Facades\File;

/**
 * Class     MoveDefaultLaravelAssets
 *
 * @package  Arcanedev\Assets\Pipes\Init
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class MoveDefaultLaravelAssets extends AbstractPipe
{
    /* -----------------------------------------------------------------
     |  Main Method
     | -----------------------------------------------------------------
     */

    /**
     * @param  array     $passable
     * @param  \Closure  $next
     *
     * @return mixed
     */
    public function handle(array $passable, Closure $next)
    {
        foreach ($this->getResources($passable) as $from => $to) {
            File::moveDirectory($from, $to);
        }

        return $next($passable);
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Get the resources paths.
     *
     * @param  array  $passable
     *
     * @return array
     */
    protected function getResources(array $passable)
    {
        return [
            resource_path('js')   => base_path($passable['path'].'/js'),
            resource_path('sass') => base_path($passable['path'].'/sass'),
        ];
    }
}
