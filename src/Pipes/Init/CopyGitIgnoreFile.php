<?php namespace Arcanedev\Assets\Pipes\Init;

use Arcanedev\Assets\Helpers\Stub;
use Closure;

/**
 * Class     CopyGitIgnoreFile
 *
 * @package  Arcanedev\Assets\Pipes\Init
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class CopyGitIgnoreFile extends AbstractPipe
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
        Stub::make('module/gitignore.stub')
            ->save(base_path($passable['path'].'/.gitignore'));

        return $next($passable);
    }
}
