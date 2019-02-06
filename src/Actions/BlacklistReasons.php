<?php

/*
 * This file is part of the Vegvisir's Laravel EmailLabs package.
 * It provides a Laravel wrapper for EmailLabs Library.
 *
 * @copyright 2019 Vegvisir Sp. z o.o. <vegvisir.for.all@gmail.com>
 * @license MIT
 */

namespace Vegvisir\EmailLabs\Actions;

use Vegvisir\EmailLabs\Actions\Action as BaseAction;

class BlacklistReasons extends BaseAction
{
    /**
     * Request method.
     *
     * @var string
     */
    protected $method = 'GET';

    /**
     * API endpoint.
     *
     * @var string
     */
    protected $action = 'blacklist_reasons';
}
