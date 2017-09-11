<?php
// DIC configuration

$container = $app->getContainer();

// -----------------------------------------------------------------------------
// Service providers
// -----------------------------------------------------------------------------

// Twig
$container['view'] = function ($c) {
    $settings = $c->get('settings');
    $view = new Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);

    // Add extensions
    $view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $c->get('request')->getUri()));
    $view->addExtension(new Twig_Extension_Debug());

    return $view;
};

// Flash messages
$container['flash'] = function ($c) {
    return new Slim\Flash\Messages;
};

// -----------------------------------------------------------------------------
// Service factories
// -----------------------------------------------------------------------------

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings');
    $logger = new Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['logger']['path'], Monolog\Logger::DEBUG));
    return $logger;
};

$container['db'] = function ($c) {
    $capsule = new Illuminate\Database\Capsule\Manager;

    $capsule->addConnection($c['settings']['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

//$container['sr'] = function (\Slim\Container $c) {
//    $db = $c->get('db');
//    $scheduleRepository = new \App\Action\SchedulerRepository($db);
//
//    return $scheduleRepository;
//};

// -----------------------------------------------------------------------------
// Action dependency Injection
// -----------------------------------------------------------------------------
//$db = $container->get('db');
//$sr = $container['sr'];
//$view = $container->get('view');
//$uploadPath = $container->get('settings')['upload_path'];
//
//$container[App\Action\SchedulerRepository::class] = function ($db) {
//
//    return new \App\Action\SchedulerRepository($db);
//};

// -----------------------------------------------------------------------------
// Action factories
// -----------------------------------------------------------------------------

$container[App\Action\HomeAction::class] = function ($c) {
    return new App\Action\HomeAction($c->get('view'), $c->get('logger'));
};

$container[App\Action\SectionAction::class] = function ($c) {
    return new App\Action\SectionAction($c->get('view'), $c->get('logger'));
};

$container[App\Action\AreaAction::class] = function ($c) {
    return new App\Action\AreaAction($c->get('view'), $c->get('logger'));
};

$container[App\Action\RegionAction::class] = function ($c) {
    return new App\Action\RegionAction($c->get('view'), $c->get('logger'));
};

$container[App\Action\SARAction::class] = function ($c) {
    return new App\Action\SARAction($c->get('view'), $c->get('logger'));
};
