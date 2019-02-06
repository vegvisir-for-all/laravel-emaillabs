<?php

/*
 * This file is part of the Vegvisir's Laravel EmailLabs package.
 * It provides a Laravel wrapper for EmailLabs Library.
 *
 * @copyright 2019 Vegvisir Sp. z o.o. <vegvisir.for.all@gmail.com>
 * @license MIT
 */

namespace Vegvisir\EmailLabs\Tools;

use EmailLabs\Tools\EmailLabsActionInterface;
use EmailLabs\Tools\EmailLabsRequestLayer as BaseEmailLabsRequestLayer;
use Vegvisir\EmailLabs\Tools\EmailLabsClient as EmailLabsCurl;

class EmailLabsRequestLayer extends BaseEmailLabsRequestLayer implements EmailLabsActionInterface
{
    /**
     * Class constructor.
     *
     * @param array $config config array
     *
     * @throws \Exception
     */
    public function __construct($config = [])
    {
        if (!$this->validateData()) {
            throw new \Exception($this->validateErrorMsg, 500);
        }
        $this->curl = new EmailLabsCurl($config);
    }

    /**
     * Override parent's method.
     *
     * @return object|string
     */
    public function getResult()
    {
        return $this->curl->getResult(
            $this->getAction(),
            $this->getMethod(),
            $this->getData(),
            $this->getParams(),
            $this->getFilters()
        );
    }

    /**
     * Validate given data using $requireData.
     *
     * return bool
     */
    protected function validateData()
    {
        $errors = 0;
        $errorFields = [];

        foreach ($this->requireData as $key) {
            if (!isset($this->data[$key])) {
                ++$errors;
                $errorFields[] = $key;
            }
        }

        if (0 === $errors) {
            return true;
        }

        $this->validateErrorMsg = 'Fields '.trim(implode(', ', $errorFields)).' are required';

        return false;
    }
}
