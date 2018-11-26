<?php namespace Arcanedev\Assets\Pipes\Make;

use Arcanedev\Assets\Helpers\Stub;
use Closure;

/**
 * Class     CopyGitIgnoreFile
 *
 * @package  Arcanedev\Assets\Pipes\Make
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class CopyGitIgnoreFile
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
        $this->getStub($passable)
             ->save(base_path($passable['path'].'/.gitignore'));

        return $next($passable);
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Get the stub file.
     *
     * @param  array  $passable
     *
     * @return \Arcanedev\Assets\Helpers\Stub
     */
    protected function getStub(array $passable)
    {
        return Stub::make("module/gitignore.stub");
    }
}
