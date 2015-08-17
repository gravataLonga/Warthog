<?php

return [
    
    'provider' => [
        /**
         * Application Service Provider
         */
        \Warthog\Log\Provider\LogServiceProvider::class,
        \App\Provider\RoutingServiceProvider::class,

        /**
         * Applications Service Provider
         * 
         */
        \App\Provider\ApplicationServiceProvider::class,
    ],

    'log' => [

        // Debug level
        'level' => 'debug',

        // Name of file
        'file'  => 'log.txt'

    ]

];