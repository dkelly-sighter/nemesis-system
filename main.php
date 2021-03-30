<?php

use Illuminate\Container\Container;
use Nemesis\Application;

require __DIR__ . '/vendor/autoload.php';

function makeApplication(Container $container) : Application {
	$application = $container->build(Application::class);
	return $application;
}

$container = Container::getInstance();
$application = makeApplication($container);
$application->run();