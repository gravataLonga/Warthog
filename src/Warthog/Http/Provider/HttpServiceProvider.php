<?php
namespace Warthog\Http\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Slim\Slim;


class HttpServiceProvider implements ServiceProviderInterface {

	public function register (Container $container)
	{
		$container['log']->debug('Service Provider :: Slim', array(__CLASS__));
		
		$container['slim'] = function ($c)
		{
			return new \Slim\App();
		};

		$this->pathconfig = $container['path.config'];
	}

	public function boot()
	{
		require_once $this->pathconfig.'/router.php';
	}
}