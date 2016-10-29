<?php
namespace API\Controllers;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\ContainerInterface;
use Respect\Validation\Validator as v;
use \ORM;

final class Main
{
    private $ci;
    private $view;
    private $logger;
    
    public function __construct(\Slim\Container $c)
    {
        $this->ci = $c;
        $this->view = $c->get("view");
        $this->logger = $c->get("logger");
    }
    
    public function render(Request $request, Response $response, $args)
    {
        $this->logger->info(__METHOD__ . " :: dispatched");
        $this->view->render($response, 'base.twig', ["title" => "Main Page"]);
        
        return $response;
    }
    
    public function version(Request $request, Response $response, $args)
    {
        $this->logger->info(__METHOD__ . " :: dispatched");
        return $response->withJson(["status" => "OK"], 200);
    }
}
