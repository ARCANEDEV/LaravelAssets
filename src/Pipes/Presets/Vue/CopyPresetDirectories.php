<?php namespace Arcanedev\Assets\Pipes\Presets\Vue;

use Arcanedev\Assets\Helpers\Stub;
use Closure;
use Illuminate\Support\Facades\File;

/**
 * Class     CopyPresetDirectories
 *
 * @package  Arcanedev\Assets\Pipes\Presets\Vue
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
        foreach ($this->getResources($passable) as $from => $to) {
            File::copyDirectory($from, $to);
        }

        return $next($passable);
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Get the preset resources.
     *
     * @param  array  $passable
     *
     * @return array
     */
    protected function getResources(array $passable)
    {
        return [
            Stub::path('presets/vue/js')  => base_path($passable['path'].'/js'),
            Stub::path('presets/vue/sass') => base_path($passable['path'].'/sass'),
        ];
    }
}
