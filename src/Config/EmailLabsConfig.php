<?php

/*
 * This file is part of the Vegvisir's Laravel EmailLabs package.
 * It provides a Laravel wrapper for EmailLabs Library.
 *
 * @copyright 2019 Vegvisir Sp. z o.o. <vegvisir.for.all@gmail.com>
 * @license MIT
 */

namespace Vegvisir\EmailLabs\Config;

class EmailLabsConfig
{
    /**
     * @var bool If true show errors
     */
    private $devMode = false;

    /**
     * @var string App key from EmailLabs panel
     */
    private $appKey = '';

    /**
     * @var string App secret from EmailLabs panel
     */
    private $appSecret = '';

    /**
     * @var string Protocol of query
     */
    private $protocol = 'https';

    /**
     * @var string Url to api panel
     */
    private $defaultUrl = '://api.emaillabs.net.pl/api/';

    /**
     * @var string Version of client
     */
    private $cliVersion = '1.3';

    /**
     * This method returns app key.
     *
     * @return string App key
     */
    public function getAppKey()
    {
        return $this->appKey;
    }

    /**
     * This method returns app secret.
     *
     * @return string App secret
     */
    public function getAppSecret()
    {
        return $this->appSecret;
    }

    /**
     * This method returns url to web-service.
     *
     * @return string Url to web-service
     */
    public function getAdress()
    {
        return $this->protocol.$this->defaultUrl;
    }

    /**
     * This method returns dev mode.
     *
     * @return bool Mode of client
     */
    public function getMode()
    {
        return $this->devMode;
    }

    /**
     * This method returns client version.
     *
     * @return string
     */
    public function getCliVersion()
    {
        return $this->cliVersion;
    }

    /**
     * This method set app key.
     *
     * @param string $appKey AppKey from panel
     */
    public function setAppKey($appKey = '')
    {
        $this->appKey = $appKey;
    }

    /**
     * This method set app secret.
     *
     * @param string $appSecret AppSecret from panel
     */
    public function setAppSecret($appSecret)
    {
        $this->appSecret = $appSecret;
    }
}
