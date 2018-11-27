<?php namespace Arcanedev\Assets\Helpers;

use Illuminate\Support\Facades\File;

/**
 * Class     Stub
 *
 * @package  Arcanedev\Assets\Helpers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Stub
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  string */
    protected $content;

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * @param  string|null  $file
     *
     * @return static
     */
    public static function make($file = null)
    {
        return (new static)->setContent(
            static::load($file ?: static::getFilePath())
        );
    }

    /**
     * Get the stub file path.
     *
     * @return string
     *
     * @throws \Exception
     */
    protected static function getFilePath()
    {
        throw new \Exception('You need to specify the stub file path.');
    }

    /**
     * Get the stub content.
     *
     * @return string
     */
    public function content()
    {
        return $this->content;
    }

    /**
     * Set the stub content.
     *
     * @param  string  $content
     *
     * @return static
     */
    protected function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Replace the placeholders.
     *
     * @param  string|array  $search
     * @param  string|array  $replace
     *
     * @return static
     */
    public function replace($search, $replace)
    {
        return $this->setContent(
            str_replace($search, $replace, $this->content)
        );
    }

    /**
     * Get the content.
     *
     * @param  string  $file
     *
     * @return string
     */
    public static function load($file)
    {
        return File::get(static::path($file));
    }

    /**
     * Save the content.
     *
     * @param  string  $path
     *
     * @return int
     */
    public function save($path)
    {
        return File::put($path, $this->content);
    }

    /**
     * Prepare the stub path.
     *
     * @param  string|null  $file
     *
     * @return string
     */
    public static function path($file = null)
    {
        $path = static::getBasePath();

        if ( ! is_null($file))
            $path = "{$path}/".trim($file, '/');

        return $path;
    }

    /**
     * Get the base stubs' path.
     *
     * @return string
     */
    public static function getBasePath()
    {
        return realpath(dirname(__DIR__, 2).'/stubs');
    }

    /**
     * Transform the stub content (json) to associated array.
     *
     * @return array
     */
    public function toArray()
    {
        return json_decode($this->content, true);
    }
}
