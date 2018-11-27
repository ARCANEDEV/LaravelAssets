<?php namespace Arcanedev\Assets\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;

/**
 * Class     TestCase
 *
 * @package  Arcanedev\Assets\Tests
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class TestCase extends BaseTestCase
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Arcanedev\Assets\AssetsServiceProvider::class,
        ];
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Get the root path of this package.
     *
     * @return string
     */
    protected static function getRootPath()
    {
        return dirname(__DIR__);
    }

    /**
     * Get the fixtures path.
     *
     * @return string
     */
    protected static function getFixturesPath()
    {
        return realpath(__DIR__.'/fixtures');
    }
}
