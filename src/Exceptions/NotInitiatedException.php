<?php namespace Arcanedev\Assets\Exceptions;

/**
 * Class     NotInitiatedException
 *
 * @package  Arcanedev\Assets\Exceptions
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class NotInitiatedException extends \Exception
{
    /** @throws  static */
    public static function throw()
    {
        throw new static('You need to initiate the multiple assets with `php artisan assets:init`');
    }
}
