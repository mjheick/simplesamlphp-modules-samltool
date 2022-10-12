<?php
/* so we don't get called without authorization */
Authentication::authenticate();

/**
 * The ajax handler is pretty simple:
 * Pass in JSON with:
 *   function=
 *   p_name1=
 *   p_...=
 *   p_nameX=
 * and get back some JSON to do something with
 * javascript does a majority of it all.
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$data = file_get_contents('php://input');
	if ($data !== false)
	{
		$req = json_decode($data, true);
		$response = [];
		$fx = isset($req['function']) ? $req['function'] : '';
		switch ($fx)
		{
			case 'ping':
				$response = ['response' => 'pong'];
			break;
			default:
				$response = ['error' => 'bad request'];
			break;
		}
		echo json_encode($response);
	}
	exit;
}
