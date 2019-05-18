<?php

namespace CoreBundle\Controller;

/**
 * Class Config
 *
 * @package CoreBundle\Controller
 */
class Config
{
    /**
     * @var array
     */
    protected static $settings = array();

    /**
     * @param $key
     *
     * @return mixed|null
     */
    public static function get($key)
    {
        return isset(self::$settings[$key]) ? self::$settings[$key] : null;
    }

    /**
     * @param $key
     * @param $value
     */
    public static function set($key, $value)
    {
        self::$settings[$key] = $value;
    }
}
