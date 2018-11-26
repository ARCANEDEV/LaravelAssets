<?php namespace Arcanedev\Assets\Pipes\Init;

use Arcanedev\Assets\Helpers\Stub;
use Closure;
use Illuminate\Support\Facades\File;

/**
 * Class     ExtractNpmDependencies
 *
 * @package  Arcanedev\Assets\Pipes\Init
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ExtractNpmDependencies extends AbstractPipe
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  array */
    protected $except = [
        'cross-env',
        'laravel-mix',
    ];

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
        if ( ! file_exists(base_path('package.json')))
            return false;

        $old = $this->getSourceFile();
        $new = $this->getStubFile($passable)->toArray();

        foreach (['devDependencies', 'dependencies'] as $key) {
            list($remaining, $extracted) = $this->partitionNpmDependencies($old[$key] ?? []);

            $old[$key] = $remaining;
            $new[$key] = array_merge($new[$key] ?? [], $extracted);

            ksort($old[$key]);
            ksort($new[$key]);
        }

        $old['workspaces'] = [$passable['root-directory'].'/*'];

        $this->saveJson('package.json', $old);
        $this->saveJson($passable['path'].'/package.json', $new);

        return $next($passable);
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Get the package.json in the base folder.
     *
     * @return array
     */
    protected function getSourceFile()
    {
        return json_decode(file_get_contents(base_path('package.json')), true);
    }

    /**
     * Get the stub file.
     *
     * @param  array  $passable
     *
     * @return \Arcanedev\Assets\Helpers\Stub
     */
    protected function getStubFile(array $passable)
    {
        return Stub::make('module/package.stub')
            ->replace([
                '{{root}}',
                '{{name}}',
            ],[
                $passable['root-package'],
                $passable['name'],
            ]);
    }

    /**
     * Split the dependencies.
     *
     * @param  array  $dependencies
     *
     * @return array
     */
    protected function partitionNpmDependencies(array $dependencies)
    {
        return collect($dependencies)->partition(function ($version, $dependency) {
            return in_array($dependency, $this->except);
        })->toArray();
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
