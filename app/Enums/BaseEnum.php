<?php
namespace App\Enums;
use ReflectionClass;

abstract class BaseEnum
{
    /**
     * Enumeration constants cache.
     *
     * @var array
     */
    private static $constants = [];

    /**
     * Get enumeration constants.
     *
     * @return array
     */
    public static function getConstants()
    {
        $calledClass = get_called_class();

        if (!isset(self::$constants[$calledClass])) {
            $reflection = new ReflectionClass($calledClass);
            self::$constants[$calledClass] = $reflection->getConstants();
        }

        return self::$constants[$calledClass];
    }

    /**
     * Get enumeration keys.
     *
     * @return array
     */
    public static function getKeys()
    {
        return array_keys(static::getConstants());
    }

    /**
     * Get enumeration values.
     *
     * @return array
     */
    public static function getValues()
    {
        return array_values(static::getConstants());
    }
}
