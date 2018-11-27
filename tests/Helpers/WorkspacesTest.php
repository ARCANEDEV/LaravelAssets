<?php namespace Arcanedev\Assets\Tests\Helpers;

use Arcanedev\Assets\Helpers\Workspaces;
use Arcanedev\Assets\Tests\TestCase;

/**
 * Class     WorkspacesTest
 *
 * @package  Arcanedev\Assets\Tests\Helpers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class WorkspacesTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_get_default()
    {
        static::assertSame('default', Workspaces::getDefaultName());
    }

    /** @test */
    public function it_can_get_all()
    {
        $expected = [
            'default' => [
                'root-directory' => 'assets',
                'root-package'   => 'assets',
            ]
        ];

        static::assertEquals($expected, Workspaces::all());

        $this->pushArcanedevWorkspace();

        $expected = [
            'default' => [
                'root-directory' => 'assets',
                'root-package'   => 'assets',
            ],
            'arcanedev' => [
                'root-directory' => 'resources/assets/arcanedev',
                'root-package'   => 'arcanedev',
            ],
        ];

        static::assertEquals($expected, Workspaces::all());
    }

    /** @test */
    public function it_can_get_keys()
    {
        static::assertEquals(['default'], Workspaces::keys());

        $this->pushArcanedevWorkspace();

        static::assertEquals(['default', 'arcanedev'], Workspaces::keys());
    }

    /** @test */
    public function it_can_get_a_workspace()
    {
        static::assertEquals(
            [
                'root-directory' => 'assets',
                'root-package'   => 'assets',
            ],
            Workspaces::get('default')
        );

        static::assertNull(Workspaces::get('arcanedev'));

        $this->pushArcanedevWorkspace();

        static::assertEquals(
            [
                'root-directory' => 'resources/assets/arcanedev',
                'root-package'   => 'arcanedev',
            ],
            Workspaces::get('arcanedev')
        );
    }

    /** @test */
    public function it_can_get_all_root_directories()
    {
        static::assertEquals(
            ['assets'],
            Workspaces::getAllRootDirectories()
        );

        $this->pushArcanedevWorkspace();

        static::assertEquals(
            ['assets', 'resources/assets/arcanedev'],
            Workspaces::getAllRootDirectories()
        );
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    protected function pushArcanedevWorkspace()
    {
        $this->app['config']->set('assets.workspaces.arcanedev', [
            'root-directory' => 'resources/assets/arcanedev',
            'root-package'   => 'arcanedev',
        ]);
    }
}
