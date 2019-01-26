<?php

namespace Core\Repositories;

/**
 * Class DependencyRepository
 *
 * @namespace Core\Repositories
 */
class DependencyRepository
{
    /**
     * @var array $repository
     */
    protected static $repository = [];

    /**
     * bind
     *
     * @param $key
     * @param $value
     */
    public static function bind($key, $value)
    {
        static::$repository[$key] = $value;
    }

    /**
     * get
     *
     * @param $key
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public static function get($key)
    {
        if (! array_key_exists($key, static::$repository)) {
            throw new \Exception("There is no {$key} bound to the dependency repository.");
        }

        return static::$repository[$key];
    }
}
