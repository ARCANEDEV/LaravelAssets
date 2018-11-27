<?php

use Arcanedev\Assets\Pipes\Presets;

return [

    /* -----------------------------------------------------------------
     |  Workspaces
     | -----------------------------------------------------------------
     */

    'default-workspace' => 'default',

    'workspaces' => [

        'default' => [
            // The root directory for your assets
            'root-directory' => 'assets',

            // Recommended to be a single word like a prefixed npm vendor, eg: @assets/{module}
            'root-package'   => 'assets',
        ],

    ],

    // The public directory
    'public-directory' => 'public',

    /* -----------------------------------------------------------------
     |  Presets
     | -----------------------------------------------------------------
     | Preset's pipes to be included in the pipeline with the `make` command.
     */

    'presets' => [

        'none' => [
            Presets\None\CreatePackageJsonFile::class,
            Presets\None\CopyGitIgnoreFile::class,
            Presets\None\CopyPresetDirectories::class,
            Presets\None\CreateMixFile::class,
        ],

        'bootstrap' => [
            Presets\Bootstrap\CreatePackageJsonFile::class,
            Presets\Bootstrap\CopyGitIgnoreFile::class,
            Presets\Bootstrap\CopyPresetDirectories::class,
            Presets\Bootstrap\CreateMixFile::class,
        ],

        'npm'   => [
            Presets\Npm\CreatePackageJsonFile::class,
            Presets\Npm\CopyGitIgnoreFile::class,
            Presets\Npm\CopyPresetDirectories::class,
        ],

        'react' => [
            Presets\React\CreatePackageJsonFile::class,
            Presets\React\CopyGitIgnoreFile::class,
            Presets\React\CopyPresetDirectories::class,
            Presets\React\CreateMixFile::class,
        ],

        'tailwind' => [
            Presets\Tailwind\CreatePackageJsonFile::class,
            Presets\Tailwind\CopyGitIgnoreFile::class,
            Presets\Tailwind\CopyPresetDirectories::class,
            Presets\Tailwind\CreateMixFile::class,
            Presets\Tailwind\CopyTailwindConfigFile::class,
        ],

        'vue' => [
            Presets\Vue\CreatePackageJsonFile::class,
            Presets\Vue\CopyGitIgnoreFile::class,
            Presets\Vue\CopyPresetDirectories::class,
            Presets\Vue\CreateMixFile::class,
        ],

    ],

];
