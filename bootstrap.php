<?php
use Symfony\Component\Yaml\Yaml;
use API\Helpers\FatalErrorHandler;

ini_set('display_errors', 0);
require_once(__DIR__ . "/vendor/autoload.php");

$settings = Yaml::parse(file_get_contents(__DIR__ . '/app/config.yml'));

$app = new \Slim\App($settings);

require_once(__DIR__ . '/app/dependencies.php');
require_once(__DIR__ . '/app/idiorm.php');
require_once(__DIR__ . '/app/middleware.php');
require_once(__DIR__ . '/app/routes.php');
require_once(__DIR__ . '/app/errorHandlers.php');

FatalErrorHandler::register();
