<?php namespace Arcanedev\Assets\Pipes\Presets\None;

use Arcanedev\Assets\Helpers\Stub;
use Closure;
use Illuminate\Support\Facades\File;

/**
 * Class     CopyPresetDirectories
 *
 * @package  Arcanedev\Assets\Pipes\Presets\None
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class CopyPresetDirectories
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
        foreach ($this->getStubs($passable) as $from => $to) {
            File::copyDirectory($from, $to);
        }

        return $next($passable);
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Get the stubs directories.
     *
     * @param  array  $passable
     *
     * @return array
     */
    protected function getStubs(array $passable)
    {
        return [
            Stub::path('presets/none/js')   => base_path($passable['path'].'/js'),
            Stub::path('presets/none/sass') => base_path($passable['path'].'/sass'),
        ];
    }
}
