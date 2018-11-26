<?php namespace Arcanedev\Assets\Pipes\Init;

use Arcanedev\Assets\Exceptions\DirectoryExistsException;
use Closure;
use Illuminate\Support\Facades\File;

/**
 * Class     EnsureRootDirectoryExists
 *
 * @package  Arcanedev\Assets\Pipes\Init
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class EnsureRootDirectoryExists extends AbstractPipe
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
     *
     * @throws \Exception
     */
    public function handle(array $passable, Closure $next)
    {
        $path = $passable['root-directory'].'/'.$passable['name'];

        if (File::isDirectory($path))
            DirectoryExistsException::throw($path);

        File::makeDirectory($path, 0755, true);

        return $next($passable + compact('path'));
    }
}
