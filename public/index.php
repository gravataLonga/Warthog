<?php

require __DIR__ . '/../vendor/autoload.php';

use Warthog\Warthog;

$services = [
    \App\Provider\ApplicationServiceProvider::class,
    \App\Provider\RoutingServiceProvider::class
];

$app = new Warthog($services);
