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

class BlacklistAdd extends BaseAction
{
    /**
     * Array with required items.
     *
     * @var array
     */
    protected $requireData = [
        'account',
        'email',
        'reason',
        'comment',
    ];

    /**
     * Data array.
     *
     * @var array
     */
    protected $data = [
        'reason' => 'spam_complaint',
        'comment' => 'Added by library to support web-service',
        'source' => 'api-client',
    ];

    /**
     * API endpoint.
     *
     * @var string
     */
    protected $action = 'blacklists/email';

    /**
     * Email address.
     *
     * @var string
     */
    protected $email;

    /**
     * Get action URL.
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action.'/'.$this->email;
    }

    /**
     * Set email.
     *
     * @param string $email E-mail address
     */
    protected function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Override parent's validateData.
     */
    protected function validateData()
    {
        if (!isset($this->email) && null === $this->email) {
            throw new \Exception('Email address is required. Use setEmail method');
        }

        parent::validateData();
    }
}
