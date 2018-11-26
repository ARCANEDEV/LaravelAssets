<?php namespace Arcanedev\Assets\Helpers;

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
    protected $raw;

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
        return (new static)->setRaw(
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
     * Set the raw file content.
     *
     * @param  string  $raw
     *
     * @return static
     */
    protected function setRaw($raw)
    {
        $this->raw = $raw;

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
        return $this->setRaw(
            str_replace($search, $replace, $this->raw)
        );
    }

    public static function load($file)
    {
        return file_get_contents(static::path($file));
    }

    public function save($path)
    {
        file_put_contents($path, $this->raw);
    }

    public static function path($file = null)
    {
        $path = dirname(__DIR__, 2).'/stubs';

        return is_null($file) ? $path : $path.'/'.trim($file, '/');
    }

    /**
     * Transform the stub content (json) to associated array.
     *
     * @return array
     */
    public function toArray()
    {
        return json_decode($this->raw, true);
    }
}
