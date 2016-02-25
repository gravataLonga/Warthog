<?php

require __DIR__ . '/../vendor/autoload.php';

use Warthog\Warthog;

$app = new Warthog(realpath(__DIR__.'/../'));


$app['slim']->run();