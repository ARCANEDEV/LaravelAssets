<?php namespace Arcanedev\Assets\Console;

use Arcanedev\Assets\Pipes;

/**
 * Class     InitCommand
 *
 * @package  Arcanedev\Assets\Console
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class InitCommand extends Command
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
    protected $signature = 'assets:init {name=laravel : The assets name folder}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Init the assets structure';

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
        $this->info('[WARNING] This command will change/reset all your resources!');

        if ( ! $this->confirm('Are you sure to continue?'))
            return;

        $this->pipeline()
            ->send($this->getPassable())
            ->through([
                Pipes\Init\EnsureRootDirectoryExists::class,
                Pipes\Init\MoveDefaultLaravelAssets::class,
                Pipes\Init\ExtractNpmDependencies::class,
                Pipes\Init\CopyYarnRcFile::class,
                Pipes\Init\CopyRootMixFile::class,
                Pipes\Init\CreateMixFile::class,
                Pipes\Init\CopyGitIgnoreFile::class,
            ])
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
            'name' => $this->argument('name'),
        ];
    }
}
