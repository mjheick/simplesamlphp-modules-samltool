<?php

$config = [
	/**
	 * If authentication is not null this will be the authsource that we will use
	 * to authenticate the user into these tools.
	 */
	'authentication' => null,

	/**
	 * In case authentication is not good enough, there is an IP whitelist that
	 * will be used as a second form of authorization.
	 * Format is IP address or IP/CIDR
	 */
	'whitelist' => [
	],
];
