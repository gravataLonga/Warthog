<?php

namespace App\Provider;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ApplicationServiceProvider implements ServiceProviderInterface
{

    /**
     * Register Service Provider
     * 
     */
    public function register(Container $pimple)
    {
        // register some services and parameters
        // on $pimple

        $pimple['log']->addInfo('Application Start');
    }
} 