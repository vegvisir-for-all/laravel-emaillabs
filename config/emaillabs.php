<?php

/*
 * This file is part of the Vegvisir's Laravel EmailLabs package.
 * It provides a Laravel wrapper for EmailLabs Library.
 *
 * @copyright 2019 Vegvisir Sp. z o.o. <vegvisir.for.all@gmail.com>
 * @license MIT
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Vegvisir EmailLabs config
    |--------------------------------------------------------------------------
    |
    | In order to make Vegvisir EmailLab's work, you need to specify
    | EMAILLABS_KEY and EMAILLABS_SECRET in your .env file
    |
    */
    'key' => env('EMAILLABS_KEY'),
    'secret' => env('EMAILLABS_SECRET'),
    'dev_mode' => env('EMAILLABS_DEV_MODE', false),
    'protocol' => env('EMAILLABS_HTTPS', true),
    'url' => env('EMAILLABS_URL', 'api.emaillabs.net.pl/api/'),
    'cli_version' => env('EMAILLABS_CLI_VERSION', '1.3'),
];
