<?php namespace Arcanedev\Assets\Pipes\Presets\Npm;

use Arcanedev\Assets\Pipes\Make\CreatePackageJsonFile as BasePipe;

/**
 * Class     CreatePackageJsonFile
 *
 * @package  Arcanedev\Assets\Pipes\Presets\Npm
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class CreatePackageJsonFile extends BasePipe
{
    /**
     * @param  array  $passable
     *
     * @return string
     */
    protected function getStubPath(array $passable)
    {
        return 'presets/npm/package.stub';
    }
}
