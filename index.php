<?php

// Get composer autoloader
require 'vendor/autoload.php';

use Guzzle\Http\Client;

// Create a client and provide a base URL
$client = new Client('http://validator.w3.org/check');

$params = array(
	'uri'	=> 'http://www.sideshow-systems.de'
);
$request = $client->post('/', null, $params);
$response = $request->send();

//echo "<pre>";
echo $response->getBody();
//echo "</pre>";

?>
