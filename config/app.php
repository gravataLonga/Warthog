<?php

return [
    
    'provider' => [

        // System Service Provider

        // Monolog
        \Warthog\Log\Provider\LogServiceProvider::class,
        // \App\Provider\RoutingServiceProvider::class,
        \Warthog\Http\Provider\HttpServiceProvider::class,

        // Application Service Provider

        \App\Provider\ApplicationServiceProvider::class,
    ],

    'log' => [

        // Debug level
        'level'     => 'debug',

        // Name of file
        'filename'  => 'warthog.txt'

    ]

];