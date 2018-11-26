<?php namespace Arcanedev\Assets\Pipes\Presets\Tailwind;

use Arcanedev\Assets\Pipes\Make\CreatePackageJsonFile as BasePipe;

/**
 * Class     CreatePackageJsonFile
 *
 * @package  Arcanedev\Assets\Pipes\Presets\Tailwind
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
        'tailwindcss' => '^0.7.2',
    ];
}
