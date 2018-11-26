<?php namespace Arcanedev\MultiAssets\Contracts\Pipes;

use Closure;

/**
 * Interface  Pipe
 *
 * @package   Arcanedev\MultiAssets\Contracts\Pipes
 * @author    ARCANEDEV <arcanedev.maroc@gmail.com>
 */
interface InitPipe
{
    public function handle(array $passable, Closure $next);
}
