<?php

// Get composer autoloader
require 'vendor/autoload.php';


$loop = React\EventLoop\Factory::create();

$dnsResolverFactory = new React\Dns\Resolver\Factory();
$dnsResolver = $dnsResolverFactory->createCached('8.8.8.8', $loop);

$factory = new React\HttpClient\Factory();
$client = $factory->create($loop, $dnsResolver);

$request = $client->request('GET', 'https://github.com/');
print_r($request);
$request->on('response', function ($response) {
	$response->on('data', function ($data) {
		print_r($data);
	});
});
$request->end();
?>
