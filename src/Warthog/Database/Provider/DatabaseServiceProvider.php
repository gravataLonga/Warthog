<?php
namespace Warthog\Database\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class DatabaseServiceProvider implements ServiceProviderInterface {

	public function register (Container $container)
	{
		$container['log']->debug('Service Provider :: Database', array(__CLASS__));
		
		$container['database'] = function ($c)
		{
			return new \Warthog\Database\Manager();
		};

		$this->pathconfig = $container['path.config'];
	}

	public function boot()
	{
		// require_once $this->pathconfig.'/router.php';
	}
}