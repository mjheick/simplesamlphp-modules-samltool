<?php

namespace SimpleSAML\Module\samltool;

use SimpleSAML\Module;

class Authentication {
	/* @var array loaded private configuration */
	private static $config = [
		'authentication' => '',
		'whitelist' => [],
	];

	/**
	 * Get our configuration
	 */
	private static function getConfig()
	{
		$config = [];
		$config_path = Module::getModuleDir('samltool') . '/conf' ;
		if (file_exists($config_path . '/configuration.php'))
		{
			require_once($config_path . '/configuration.php');
		}
		self::$config = $config;
	}

	/**
	 * Determines if we need to stop the user from using
	 * This is a gateway. User is either stuck at login,
	 * provided a http/401 due to non-ip-whitelist, or 
	 * allowed through.
	 */
	public static function authenticate()
	{
		self::getConfig();
		if (!is_null(self::$config['authentication']))
		{
		}

		if (isset(self::$config['whitelist']) && count(self::$config['whitelist']) > 0)
		{
			$ip = self::getIPAddress();
			self::http401();
		}
	}

	/**
	 * Get the IP address. Change/adjust for proxies
	 *
	 * @return string
	 */
	private static function getIPAddress()
	{
		$ip = '0.0.0.0';

		if (isset($_SERVER['REMOTE_ADDR']))
		{
			$ip = $_SERVER['REMOTE_ADDR'];
		}

		if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
		{
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}

		return $ip;
	}

	/**
	 * Throw a 401 and terminate
	 */
	private static function http401(): void
	{
		header('HTTP/1.1 401 Unauthorized');
		exit;
	}
}
