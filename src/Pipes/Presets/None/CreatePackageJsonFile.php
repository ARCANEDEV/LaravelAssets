<?php namespace Arcanedev\Assets\Pipes\Presets\None;

use Arcanedev\Assets\Pipes\Make\CreatePackageJsonFile as BasePipe;

/**
 * Class     CreatePackageJsonFile
 *
 * @package  Arcanedev\Assets\Pipes\Presets\None
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class CreatePackageJsonFile extends BasePipe
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /**
     * Dependencies for development environment.
     *
     * @var array
     */
    protected $devDependencies = [
        'laravel-mix' => '^2.0',
        'lodash'      => '^4.17.5',
        'axios'       => '^0.18',
    ];
}
