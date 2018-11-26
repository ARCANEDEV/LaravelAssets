<?php namespace Arcanedev\Assets\Pipes\Make;

use Arcanedev\Assets\Exceptions\DirectoryExistsException;
use Closure;
use Illuminate\Support\Facades\File;

/**
 * Class     EnsureAssetsDirectoryExists
 *
 * @package  Arcanedev\Assets\Pipes\Make
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class EnsureAssetsDirectoryExists extends AbstractPipe
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
        $path = $passable['root-directory'].'/'.$passable['name'];

        if (File::isDirectory($path))
            DirectoryExistsException::throw($path);

        File::makeDirectory($path, 0755, true);

        return $next($passable + compact('path'));
    }
}
