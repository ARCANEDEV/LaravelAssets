<?php namespace Arcanedev\Assets\Pipes\Init;

use Arcanedev\Assets\Helpers\Stub;
use Closure;

/**
 * Class     CopyRootMixFile
 *
 * @package  Arcanedev\Assets\Pipes\Init
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class CopyRootMixFile extends AbstractPipe
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
             ->save(base_path('webpack.mix.js'));

        return $next($passable);
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Get the stub.
     *
     * @param  array  $passable
     *
     * @return \Arcanedev\Assets\Helpers\Stub
     */
    protected function getStub(array $passable)
    {
        return Stub::make('init/root-webpack.mix.stub')
                   ->replace('{{root}}', $passable['root-directory']);
    }
}
