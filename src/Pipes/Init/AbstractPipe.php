<?php namespace Arcanedev\Assets\Pipes\Init;

use Closure;

/**
 * Class     Pipe
 *
 * @package  Arcanedev\Assets\Pipes\Init
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class AbstractPipe
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
    abstract public function handle(array $passable, Closure $next);
}
