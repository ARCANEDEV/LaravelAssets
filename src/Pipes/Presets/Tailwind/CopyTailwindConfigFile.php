<?php namespace Arcanedev\Assets\Pipes\Presets\Tailwind;

use Arcanedev\Assets\Helpers\Stub;
use Closure;
use Illuminate\Support\Facades\File;

/**
 * Class     CopyTailwindConfigFile
 *
 * @package  Arcanedev\Assets\Pipes\Presets\Tailwind
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class CopyTailwindConfigFile
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
        File::copy(
            Stub::path('presets/tailwind/tailwind.js'),
            base_path($passable['path'].'/tailwind.js')
        );

        return $next($passable);
    }
}
