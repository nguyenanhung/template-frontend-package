<?php
/**
 * Project template-backend-package
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 02/07/2022
 * Time: 00:19
 */
require_once __DIR__ . '/../vendor/autoload.php';
$config = [
    'DATABASE'    => [
        'driver'    => 'mysql',
        'host'      => 'mariadb',
        'username'  => 'root',
        'password'  => 'hungna',
        'database'  => 'docker_database',
        'port'      => 3306,
        'prefix'    => '',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
    ],
    'OPTIONS'     => [
        'showSignature'         => true,
        'debugStatus'           => true,
        'debugLevel'            => 'error',
        'loggerPath'            => __DIR__ . '/../tmp/logs/',
        // Cache
        'cachePath'             => __DIR__ . '/../tmp/cache/',
        'cacheTtl'              => 3600,
        'cacheDriver'           => 'files',
        'cacheFileDefaultChmod' => 0777,
        'cacheSecurityKey'      => 'BACKEND-SERVICE',
    ],
    'API_SERVICE' => [
        'username'     => '',
        'secret_token' => '',
        'URL'          => [
            'LIVE' => '',
        ],
    ],
    'HANDLE'      => [
        'homepage'   => '',
        'assets_url' => '',
        '404_page'   => '',
    ]
];

use nguyenanhung\Frontend\Your_Project\Module\TestModule;

$inputData = [
    'acc'       => 'xxx',
    'signature' => 'xxx'
];

$api = new TestModule($config['OPTIONS']);
$api->setSdkConfig($config);
$api->setInputData($inputData)->handle();

echo "<pre>";
print_r($api->getResponse());
echo "</pre>";
