<?php

use React\Socket\Connection;

include_once __DIR__.'/../vendor/autoload.php';

$loop = React\EventLoop\Factory::create();

$dnsResolverFactory = new React\Dns\Resolver\Factory();
$dns = $dnsResolverFactory->createCached('8.8.8.8', $loop);

$factory = new Socks\Factory($loop, $dns);
$server = $factory->createServer();
$server->listen('9050','localhost');
$server->setAuthArray(array(
    'tom' => 'god',
    'user' => 'p@ssw0rd'
));

$server->on('ready', function(Connection $connection) {

});

$loop->run();
