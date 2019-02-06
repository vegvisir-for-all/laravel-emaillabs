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

class Blacklist extends BaseAction
{
    /**
     * Request method
     *
     * @var string
     */
    protected $method = 'GET';

    /**
     * API endpoint
     *
     * @var string
     */
    protected $action = 'blacklists';

    /**
     * Filters array.
     *
     * @var array
     */
    protected $filters = [];

    /**
     * Params array.
     *
     * @var array
     */
    protected $params = [
        'offset' => 0,
        'limit' => 100,
        'sort' => '-created_at'
    ];

    /**
     * Allowed filters.
     *
     * @var array
     */
    protected $allowFilters = [
        'account',
        'email',
        'created_at.from',
        'created_at.to',
        'reason',
        'source'
    ];

    /**
     * Allowed params.
     *
     * @var array
     */
    protected $allowParams = [
        'sort',
        'limit',
        'offset'
    ];
}
