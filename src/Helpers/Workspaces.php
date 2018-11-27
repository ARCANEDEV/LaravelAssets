<?php namespace Arcanedev\Assets\Helpers;

use Illuminate\Support\Arr;

/**
 * Class     Workspaces
 *
 * @package  Arcanedev\Assets\Helpers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Workspaces
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Get the default workspace name.
     *
     * @param  string|null  $default
     *
     * @return \Illuminate\Config\Repository|mixed
     */
    public static function getDefaultName($default = null)
    {
        return config('assets.default-workspace', $default);
    }

    /**
     * Get the workspace configs.
     *
     * @param  string      $name
     * @param  array|null  $default
     *
     * @return array|null
     */
    public static function get($name, $default = null)
    {
        return Arr::get(static::all(), $name, $default);
    }

    /**
     * Get all the workspaces.
     *
     * @return array
     */
    public static function all()
    {
        return config('assets.workspaces');
    }

    /**
     * Get all workspaces' names.
     *
     * @return array
     */
    public static function keys()
    {
        return array_keys(static::all());
    }

    /**
     * Get all the root directories.
     *
     * @return array|mixed
     */
    public static function getAllRootDirectories()
    {
        return array_column(static::all(), 'root-directory');
    }

    /**
     * Check if the root directory exists by the given workspace.
     *
     * @param  string  $name
     *
     * @return bool
     */
    public static function rootDirectoryExists($name)
    {
        $directory = config("assets.workspaces.{$name}.root-directory");

        return ! is_null($directory) && is_dir($directory);
    }
}
