<?php

namespace Warthog;

use Warthog\Foundation\Application;

class Warthog extends Application {

    /**
     * The current globally available container (if any).
     *
     * @var static
     */
    protected static $instance;

    /**
     * @var array list of provider
     */
    public $provider = [];

    /**
     * @var boolean is booted?
     */
    protected $boot = false;

    /**
     * @var string basePath
     */
    protected $basePath;

    /**
     * Contruct to recive list of provider
     * 
     * @return Warthog\Warthog;
     */
    public function __construct($basePath)
    {
        $this->registerBaseBindings();

        if ($basePath) {
            $this->setBasePath($basePath);
        }

        $this->registerServiceProvider();
    }

    /**
     * Return base path of our applications
     * @return string basePath
     */
    public function getBasePath()
    {
        return $this->basePath;
    }

    /**
     * Setting base path of our applications
     * 
     * @return void
     */
    public function setBasePath ($basePath)
    {
        $this->basePath = rtrim($basePath, '\/');

        $this->bindPathsInContainer();

        return $this;
    }

    /**
     * Bind Paths into container
     * @return 
     */
    public function bindPathsInContainer()
    {
        $this['path'] = $this->path();

        foreach (['base', 'config', 'database', 'public', 'storage'] as $path) {
            $this['path.'.$path] = $this->{$path.'Path'}();
        }
    }

    public function path()
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'app';
    }

    public function basePath ()
    {
        return $this->basePath;
    }

    public function configPath ()
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'config';
    }

    public function databasePath ()
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'database';
    }

    public function publicPath ()
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'public';
    }

    public function storagePath ()
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'storage';
    }

    /**
     * Register the basic bindings into the container.
     *
     * @return void
     */
    protected function registerBaseBindings()
    {
        static::setInstance($this);

        // Return app of this instance
        $this['app'] = $this;
    }

    /**
     * Set the globally available instance of the container.
     *
     * @return static
     */
    public static function getInstance()
    {
        return static::$instance;
    }

    /**
     * Set the shared instance of the container.
     *
     * @param $container
     * @return void
     */
    public static function setInstance($container)
    {
        static::$instance = $container;
    }

     /**
     * Resolve a service provider instance from the class name.
     *
     * @param  string  $provider
     * @return
     */
    public function resolveProviderClass($provider)
    {
        return new $provider($this);
    }

    public function registerServiceProvider ()
    {
        $configPath = $this['path.config'];

        if(!$this->boot) {

            $arr = include $configPath.'/app.php';

            foreach($arr['provider'] as $provider) {
                if(is_string($provider)) {
                    $provider = $this->resolveProviderClass($provider);
                }
                $this->register($provider);

                if(method_exists($provider, 'boot'))
                {
                    $provider->boot();
                }
            }

            $this->boot = true;
        }
    }

}