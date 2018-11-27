<?php namespace Arcanedev\Assets\Pipes\Init;

use Arcanedev\Assets\Helpers\Stub;
use Closure;
use Illuminate\Support\Facades\File;

/**
 * Class     CopyYarnRcFile
 *
 * @package  Arcanedev\Assets\Pipes\Init
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class CopyYarnRcFile extends AbstractPipe
{
    /* -----------------------------------------------------------------
     |  Main Method
     | -----------------------------------------------------------------
     */

    /**
     * @param  array    $passable
     * @param  Closure  $next
     *
     * @return mixed
     */
    public function handle(array $passable, Closure $next)
    {
        File::copy(Stub::path('init/yarnrc.stub'), base_path('.yarnrc'));

        return $next($passable);
    }
}
