<?php namespace Arcanedev\Assets\Pipes\Make;

use Arcanedev\Assets\Helpers\Stub;
use Closure;
use Illuminate\Support\Facades\File;

/**
 * Class     CreatePackageJsonFile
 *
 * @package  Arcanedev\Assets\Pipes\Make
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class CreatePackageJsonFile extends AbstractPipe
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /**
     * Dependencies for production environment.
     *
     * @var array
     */
    protected $dependencies = [];

    /**
     * Dependencies for development environment.
     *
     * @var array
     */
    protected $devDependencies = [];

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
        $this->saveJson($passable['path'].'/package.json', array_merge(
            $this->getStub($passable)->toArray(),
            $this->getAllDependencies()
        ));

        return $next($passable);
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Get the stub for the `package.json` file.
     *
     * @param  array  $passable
     *
     * @return \Arcanedev\Assets\Helpers\Stub
     */
    protected function getStub(array $passable)
    {
        return Stub::make(static::getStubPath($passable))
            ->replace(
                [
                    '{{root}}',
                    '{{name}}',
                ],
                [
                    $passable['root-package'],
                    $passable['name'],
                ]
            );
    }

    /**
     * @param  array  $passable
     *
     * @return string
     */
    protected function getStubPath(array $passable)
    {
        return 'module/package.stub';
    }

    /**
     * Get all dependencies.
     *
     * @return array
     */
    protected function getAllDependencies()
    {
        ksort($this->dependencies);
        ksort($this->devDependencies);

        return array_filter([
            'dependencies'    => $this->dependencies,
            'devDependencies' => $this->devDependencies,
        ]);
    }

    /**
     * Save the content as a json file.
     *
     * @param  string  $path
     * @param  array   $content
     *
     * @return int
     */
    protected function saveJson($path, array $content)
    {
        $content = array_filter($content);

        return File::put(
            base_path($path),
            json_encode($content, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . PHP_EOL
        );
    }
}
