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
     */
    public function __construct($config = [])
    {
        $this->curl = new EmailLabsCurl($config);
    }

    /**
     * Override parent's method.
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
}
