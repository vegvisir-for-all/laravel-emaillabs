<?php

/*
 * This file is part of the Vegvisir's Laravel EmailLabs package.
 * It provides a Laravel wrapper for EmailLabs Library.
 *
 * @copyright 2019 Vegvisir Sp. z o.o. <vegvisir.for.all@gmail.com>
 * @license MIT
 */

namespace Vegvisir\EmailLabs\Actions;

use Vegvisir\EmailLabs\Tools\EmailLabsRequestLayer;

class Action extends EmailLabsRequestLayer
{
    /**
     * @var string Method of the request
     */
    protected $method = 'POST';

    /**
     * @var array Array with data to send
     */
    protected $data = [];
}
