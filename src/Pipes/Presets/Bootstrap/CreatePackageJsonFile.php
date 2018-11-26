<?php namespace Arcanedev\Assets\Pipes\Presets\Bootstrap;

use Arcanedev\Assets\Pipes\Make\CreatePackageJsonFile as BasePipe;

/**
 * Class     CreatePackageJsonFile
 *
 * @package  Arcanedev\Assets\Pipes\Presets\Bootstrap
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
        'axios'       => '^0.18',
        'bootstrap'   => '^4.0.0',
        'jquery'      => '^3.2',
        'laravel-mix' => '^2.0',
        'lodash'      => '^4.17.5',
        'popper.js'   => '^1.12',
    ];
}
