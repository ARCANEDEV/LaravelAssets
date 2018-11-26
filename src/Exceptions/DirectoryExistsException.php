<?php namespace Arcanedev\Assets\Exceptions;

/**
 * Class     DirectoryExistsException
 *
 * @package  Arcanedev\Assets\Exceptions
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class DirectoryExistsException extends \Exception
{
    /**
     * @param  string  $path
     *
     * @throws \Exception
     */
    public static function throw($path)
    {
        throw new \Exception("The `{$path}` folder already exists`!");
    }
}
