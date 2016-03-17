<?php

$caches = ['caches' => []];

$caches['caches']['Cache\Persistence'] = [
    'adapter' => 'filesystem',
    'ttl' => 86400,
    'options' => [
        'cache_dir' => __DIR__ . '/../../data/cache/'
    ]
];

if (extension_loaded('redis')) {
    $caches['caches']['Cache\Transient'] = [
        'adapter' => 'redis',
        'ttl' => 60,
        'plugins' => [
            // todo:  Plugin 'exception_handler' not found
//            'exception_handler' => [
//                'throw_exceptions' => true,
//            ],
        ],
        'options' => [
            'server' => [
                'host' => $_ENV['REDIS_HOST'],
                'port' => $_ENV['REDIS_PORT'],
            ],
        ]
    ];
}

return $caches;