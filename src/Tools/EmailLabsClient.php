<?php

/*
 * This file is part of the Vegvisir's Laravel EmailLabs package.
 * It provides a Laravel wrapper for EmailLabs Library.
 *
 * @copyright 2019 Vegvisir Sp. z o.o. <vegvisir.for.all@gmail.com>
 * @license MIT
 */

namespace Vegvisir\EmailLabs\Tools;

use EmailLabs\Tools\EmailLabsFilter;

class EmailLabsClient
{
    /**
     * GuzzleHttp client container.
     *
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * Config array.
     *
     * @var array
     */
    protected $config;

    /**
     * Class constructor.
     *
     * @param array $config Config data
     */
    public function __construct($config = [])
    {
        $this->config = $config;
        $this->client = new \GuzzleHttp\Client([
            'headers' => [
                'Authorization' => 'Basic '.base64_encode($config['key'].':'.$config['secret']),
                'X-EL-CLI-VERSION' => $config['cli_version'],
                'Content-type' => 'application/x-www-form-urlencoded',
            ],
        ]);
    }

    /**
     * Fetch result.
     *
     * @param string     $action  API endpoint
     * @param string     $method  Request method
     * @param array      $data    Data array
     * @param null|mixed $params
     * @param null|mixed $filters
     * @param null|array $params  Params array
     * @param null|array $filters Filters array
     *
     * @throws \Exception
     *
     * @return object|string
     */
    public function getResult(
        $action,
        $method,
        $data = [],
        $params = null,
        $filters = null
    ) {
        $url = static::generateUrl($this->config).$action;

        if (null !== $params) {
            $url = sprintf('%s?%s', $url, http_build_query($params));
        }

        if (null !== $filters) {
            $url .= (new EmailLabsFilter())->setFilter($filters);
        }

        if (isset($this->data)) {
            $data = array_merge($this->data, $data);
        }

        try {
            $request = $this->client->{$method}($url, [
                'form_params' => $data,
            ]);

            return json_decode($request->getBody()->getContents())->data;
        } catch (\Exception $e) {
            $originalMessage = $e->getMessage();
            $start = strpos($originalMessage, '{');
            $length = strpos($originalMessage, '}') - strpos($originalMessage, '{') + 1;
            $response = json_decode(substr($originalMessage, $start, $length));

            throw new \Exception($response->message, $e->getCode());
        }
    }

    /**
     * Generate API URL.
     *
     * @param array $config Config array
     *
     * @return string
     */
    private static function generateUrl($config = [])
    {
        return ($config['protocol'] ? 'https' : 'http').'://'.$config['url'];
    }
}
