<?php namespace Arcanedev\Assets\Pipes\Make;

use Closure;

/**
 * Class     AbstractPipe
 *
 * @package  Arcanedev\Assets\Pipes\Make
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
