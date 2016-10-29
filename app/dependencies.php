<?php

// DIC configuration
$container = $app->getContainer();

// Twig
$container['view'] = function ($c) {
    $settings = $c->get('settings');
    $view = new Slim\Views\Twig(__DIR__ . '/' . $settings['view']['template_path'], $settings['view']['twig']);
    // Add extensions
    $view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $c->get('request')->getUri()));
    $view->addExtension(new Twig_Extension_Debug());

    ## If globals are set...
    if (isset($settings['view']['globals'])) {
        foreach ($settings['view']['globals'] as $glo => $bal) {
            $view->getEnvironment()->addGlobal($glo, $bal);
        }
    }
    
    return $view;
};

// Flash messages
$container['flash'] = function ($c) {
    return new Slim\Flash\Messages;
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings');
    $logger = new Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler(__DIR__ . '/' . $settings['logger']['path'], Monolog\Logger::DEBUG));
    return $logger;
};
