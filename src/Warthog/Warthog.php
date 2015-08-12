<?php

namespace Warthog;

use Pimple\Container;

class Warthog extends Container {

    /**
     * 
     * 
     * 
     */
    public function __construct($provider = [])
    {
        $this->provider = $provider;

        $this->boot();
    }


    public function boot ()
    {
        if(count($this->provider))
        {
            foreach($this->provider as $provider)
            {
                if(is_string($provider))
                {
                    $provider = $this->resolveProviderClass($provider);
                }

                $this->register($provider);
            }                
        }
    }

    /**
     * Resolve a service provider instance from the class name.
     *
     * @param  string  $provider
     */
    public function resolveProviderClass($provider)
    {
        return new $provider($this);
    }

}