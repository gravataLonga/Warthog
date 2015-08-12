<?php

namespace App\Provider;


use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Slim\Slim;

class RoutingServiceProvider implements ServiceProviderInterface {

    /**
     * Register Service Provider
     * 
     */
    public function register(Container $pimple)
    {
        // register some services and parameters
        // on $pimple
        $pimple['route'] = function ($c) {
            return new Slim();
        };

        $pimple['route']->run();
    }
}