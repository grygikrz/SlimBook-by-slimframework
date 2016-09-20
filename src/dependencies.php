<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
//$container['renderer'] = function ($c) {
//    $settings = $c->get('settings')['renderer'];
//    return new Slim\Views\Twig($settings['template_path']);
//};

$container['view'] = function ($c) {
	$settings = $c->get('settings')['renderer'];
    $view = new \Slim\Views\Twig($settings['template_path']);

    $view->addExtension(new \Slim\Views\TwigExtension(
        $c['router'],
        $c['request']->getUri()
    ));

    return $view;
};



// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], Monolog\Logger::DEBUG));
    return $logger;
};

//db config
//$container['db'] = function ($c) {
//    $db = $c['settings']['db'];
//    $pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'],
//        $db['user'], $db['pass']);
//    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//    return $pdo;
//};



// Init eloquent
$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) {
    return $capsule;
};

//flash message
$container['flash'] = function ($c) {
    return new \Slim\Flash\Messages();
};

$container[App\Controllers\HomeController::class] = function ($c) {

    $view = $c->get('view');
    $logger = $c->get('logger');
    $flash = $c->get('flash');

    return new App\Controllers\HomeController($view, $logger, $flash);

    };

