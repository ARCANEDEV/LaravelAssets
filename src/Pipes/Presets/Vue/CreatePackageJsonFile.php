<?php namespace Arcanedev\Assets\Pipes\Presets\Vue;

use Arcanedev\Assets\Pipes\Make\CreatePackageJsonFile as BasePipe;

/**
 * Class     CreatePackageJsonFile
 *
 * @package  Arcanedev\Assets\Pipes\Presets\Vue
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
        'laravel-mix' => '^2.0',
        'lodash'      => '^4.17.5',
        'vue'         => '^2.5.17'
    ];
}
