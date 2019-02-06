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

class AddTemplate extends BaseAction
{
    /**
     * Array with required items.
     *
     * @var array
     */
    protected $requireData = ['html'];

    /**
     * Array with allowed items.
     *
     * @var array
     */
    protected $allowedData = ['html', 'txt'];

    /**
     * API endpoint
     *
     * @var string
     */
    protected $action = 'add_template';
}
