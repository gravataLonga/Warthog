<?php

namespace Warthog\Log\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;


class LogServiceProvider implements ServiceProviderInterface {


	public function register (Container $container)
	{
		$container['log'] = function ($c)
		{
			$storage_path =  rtrim($c['path.storage'],'/') .'/logs/log.txt';

			// create a log channel
			$log = new Logger('warthog');
			$stream = new StreamHandler($storage_path, Logger::DEBUG);
			$log->pushHandler($stream);
			return $log;
		};
	}
}