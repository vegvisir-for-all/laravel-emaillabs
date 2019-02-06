<?php

/*
 * This file is part of the Vegvisir's Laravel EmailLabs package.
 * It provides a Laravel wrapper for EmailLabs Library.
 *
 * @copyright 2019 Vegvisir Sp. z o.o. <vegvisir.for.all@gmail.com>
 * @license MIT
 */

namespace Vegvisir\EmailLabs;

class EmailLabs
{
    /**
     * Config array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Class constructor.
     *
     * @param array $config Config array
     */
    public function __construct($config = [])
    {
        $this->config = $config;
    }

    /**
     * Call appropriate action.
     *
     * @param string $name      Name of action in whatever case
     * @param array  $arguments Arguments (first should be array of data or null)
     *
     * @throws \Exception
     *
     * @return object|string
     */
    public function __call($name, $arguments)
    {
        $className = '\\Vegvisir\\EmailLabs\\Actions\\'.studly_case($name);

        if (!class_exists($className)) {
            throw new \Exception('Action does not exist', 500);
        }

        $action = new $className($this->config);

        if (\is_array($arguments[0])) {
            foreach ($arguments[0] as $key => $value) {
                $action->setData($key, $value);
            }
        }

        return $action->getResult();
    }
}
