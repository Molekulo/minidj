<?php
session_start();

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Router;
use Illuminate\Routing\UrlGenerator;

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
// set a constant that holds the project's "application" folder, like "/var/www/application".
define('APP', ROOT . 'Application' . DIRECTORY_SEPARATOR);

require ROOT . 'vendor/autoload.php';

// load application config (error reporting etc.)
require APP . '/../config/config.php';

$container = new Container();

$request = Request::capture();
$container->instance('Illuminate\Http\Request', $request);

$events = new Dispatcher($container);

$router = new Router($events, $container);

require_once '../routes.php';

$redirect = new Redirector(new UrlGenerator($router->getRoutes(), $request));

// Dispatch the request through the router
$response = $router->dispatch($request);

// Send the response back to the browser
$response->send();
