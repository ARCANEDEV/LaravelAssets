<?php namespace Arcanedev\Assets\Pipes\Init;

use Arcanedev\Assets\Helpers\Stub;
use Closure;

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
        copy(Stub::path('init/.yarnrc'), base_path('.yarnrc'));

        return $next($passable);
    }
}
