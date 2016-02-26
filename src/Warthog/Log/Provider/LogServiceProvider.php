<?php
namespace Warthog\Log\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;


class LogServiceProvider implements ServiceProviderInterface {


	public function register (Container $container)
	{
		$config = config();

		$log 	= $config['log'];

		foreach ($log as $key => $value)
		{
			$container['log.'.$key] = $value; 	
		} 

		$container['log'] = function ($c)
		{
			$storage_path =  rtrim($c['path.storage'],'/') .'/logs/' . $c['log.filename'];

			// create a log channel
			$log = new Logger('warthog_system', [new StreamHandler($storage_path, Logger::DEBUG)]);
			
			return $log;
		};
	}
}