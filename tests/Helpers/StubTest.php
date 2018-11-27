<?php namespace Arcanedev\Assets\Tests\Helpers;

use Arcanedev\Assets\Helpers\Stub;
use Arcanedev\Assets\Tests\TestCase;

/**
 * Class     StubTest
 *
 * @package  Arcanedev\Assets\Tests\Helpers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class StubTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_get_default_path()
    {
        static::assertSame(
            realpath(static::getRootPath().'/stubs'),
            Stub::getBasePath()
        );

        static::assertSame(
            realpath(static::getFixturesPath().'/stubs'),
            CustomStub::getBasePath()
        );
    }

    /** @test */
    public function it_can_make_stub()
    {
        static::assertStringStartsWith(
            'Hello there {{name}}!',
            CustomStub::make('hello.stub')->content()
        );
    }

    /**
     * @test
     *
     * @expectedException         \Exception
     * @expectedExceptionMessage  You need to specify the stub file path.
     */
    public function it_throws_exception_on_undefined_file_path_on_make_method()
    {
        Stub::make();
    }

    /** @test */
    public function it_can_replace_placeholders()
    {
        static::assertStringStartsWith(
            'Hello there ARCANEDEV!',
            CustomStub::make('hello.stub')->replace('{{name}}', 'ARCANEDEV')->content()
        );
    }
}

class CustomStub extends Stub {
    /**
     * Get the base stubs' path.
     *
     * @return string
     */
    public static function getBasePath()
    {
        return realpath(dirname(__DIR__).'/fixtures/stubs');
    }
}
