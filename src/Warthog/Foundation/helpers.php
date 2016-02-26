<?php

if(!function_exists('app')) {

    function app ()
    {
    	return \Warthog\Warthog::getInstance();
    }
}

if(!function_exists('path_app')) {

    function path_app ()
    {
    	$app = app();
    	return $app['path'];
    }
}

if(!function_exists('path_config')) {

    function path_config ()
    {
    	$app = app();
    	return $app['path.config'];
    }
}

if(!function_exists('config')) {

    function config ()
    {
    	$config = require path_config().'/app.php';

    	return $config;
    }
}

if(!function_exists('get'))
{
	function get($uri, $clouser, $args = [])
	{
		$app = app();
		return $app['slim']->get($uri, $clouser);
	}
}

if(!function_exists('post'))
{
	function post($uri, $clouser, $args = [])
	{
		$app = app();
		return $app['slim']->post($uri, $clouser);
	}
}

if(!function_exists('put'))
{
	function put($uri, $clouser, $args = [])
	{
		$app = app();
		return $app['slim']->put($uri, $clouser);
	}
}

if(!function_exists('delete'))
{
	function delete($uri, $clouser, $args = [])
	{
		$app = app();
		return $app['slim']->delete($uri, $clouser);
	}
}

if(!function_exists('head'))
{
	function head($uri, $clouser, $args = [])
	{
		$app = app();
		return $app['slim']->head($uri, $clouser);
	}
}