<?php namespace Arcanedev\Assets\Tests;

/**
 * Class     AssetsServiceProviderTest
 *
 * @package  Arcanedev\Assets\Tests
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class AssetsServiceProviderTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    private $provider;

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    protected function setUp()
    {
        parent::setUp();

        $this->provider = $this->app->getProvider(\Arcanedev\Assets\AssetsServiceProvider::class);
    }

    protected function tearDown()
    {
        unset($this->provider);

        parent::tearDown();
    }

    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_be_instantiated()
    {
        $expectations = [
            \Illuminate\Support\ServiceProvider::class,
            \Arcanedev\Support\ServiceProvider::class,
            \Arcanedev\Support\PackageServiceProvider::class,
            \Arcanedev\Assets\AssetsServiceProvider::class,
        ];

        foreach ($expectations as $expected)
        {
            static::assertInstanceOf($expected, $this->provider);
        }
    }
}

