<?php namespace Arcanedev\Assets\Pipes\Init;

use Arcanedev\Assets\Helpers\Stub;
use Closure;

/**
 * Class     CreateMixFile
 *
 * @package  Arcanedev\Assets\Pipes\Init
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class CreateMixFile extends AbstractPipe
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
        $this->getStub($passable)
             ->save($passable['path'].'/webpack.mix.js');

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
        return Stub::make('module/webpack.mix.stub')
            ->replace([
                '{{asset_directory}}',
                '{{public_directory}}',
                '{{name}}',
            ],[
                $passable['path'],
                $passable['public-directory'],
                'app',
            ]);
    }
}
