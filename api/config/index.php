<?php
/**
 * @license   https://github.com/Init/licese.md
 * @copyright Copyright (c) 2017
 * @author    : bugbear
 * @date      : 2017/3/16
 * @time      : 下午5:46
 */

return [
    'server' => [
        'host' => '127.0.0.1',
        'port' => '6666',
    ],
    'db' => [
        'host' => '127.0.0.1',
        'port' => '3306',
        'user' => 'root',
        'password' => '123123',
        'database' => 'knight',
    ],
    'session' => [
        'issuer' => 'localhost',
        'audience' => '127.0.0.1',
        'expired' => 3600,
        'key' => 'test',
    ],
    'jwt' => [
        'issuer' => 'localhost',
        'audience' => '127.0.0.1',
        'expired' => 3600,
        'key' => 'test',
    ],
    'courser' => [
        'loader' => [
            'Photo' => 'Knight\Model\Photo',
        ]
    ]
];