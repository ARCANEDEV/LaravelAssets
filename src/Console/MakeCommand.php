<?php namespace Arcanedev\Assets\Console;

use Arcanedev\Assets\Pipes;
use Illuminate\Support\Str;

/**
 * Class     MakeCommand
 *
 * @package  Arcanedev\Assets\Console
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class MakeCommand extends Command
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assets:make {name} {--P|preset= : Preset for the new asset}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a new assets folder';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->ensureIsInitiated();

        $this->pipeline()
             ->send($passable = $this->getPassable())
             ->through($this->getPipes($passable['preset']))
             ->then(function (array $passable) {
                 $this->info('All finished! Please run `yarn install && yarn run dev` and you are all set to go!');
             });
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Get the passable for the pipeline.
     *
     * @return array
     */
    protected function getPassable()
    {
        return parent::getPassable() + [
            'name'   => Str::slug($this->argument('name') ?: $this->ask('What is the name of the asset')),
            'preset' => $this->getPreset(),
        ];
    }

    /**
     * Get the pipes.
     *
     * @param  string  $preset
     *
     * @return array
     */
    protected function getPipes($preset)
    {
        return array_merge([
            Pipes\Make\EnsureAssetsDirectoryExists::class,
        ], $this->getPresetPipes($preset));
    }

    /**
     * Get the preset pipes.
     *
     * @param  string  $preset
     *
     * @return array
     *
     * @throws \Exception
     */
    private function getPresetPipes($preset)
    {
        $pipes = config("assets.presets.{$preset}");

        if ( ! is_array($pipes))
            throw new \Exception("Invalid selected preset [{$preset}]");

        return $pipes;
    }

    /**
     * Get the selected preset.
     *
     * @return string
     */
    protected function getPreset()
    {
        if (is_null($preset = $this->option('preset'))) {
            $preset = $this->choice(
                'Choose your preset',
                array_keys(config('assets.presets')),
                'none'
            );
        }

        return $preset;
    }
}
