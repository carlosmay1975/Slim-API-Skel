<?php
namespace API\Middleware;

use Slim\Http\Request;
use Slim\Http\Response;

class TokenOverBasicAuth
{
    private $check;    
    private $realm = 'Protected Area';
    private $path = '/';
    
    public function __construct(callable $check, $path = null, $realm = null)
    {
        $this->check = $check;
     
        if ($path) {
            $this->path = $path;
        }
        
        if ($realm) {
            $this->$realm = $realm;
        }        
    }
    
    public function  __invoke(Request $request, Response $response, $next)
    {
        if (preg_match(
                '|^' . $this->path . '.*|',
                '/' . $request->getUri()->getPath())
		) {
            if (!call_user_func($this->check, $request->getHeaderline('PHP_AUTH_USER'))) {
                $response = $response->withStatus(302);
                $response = $response->withHeader('WWW-Authenticate', 'Basic realm="' . $this->realm . '"');
                
                return $response->write(json_encode(["message"=>"Authentication error."]));
            }
        }

        return $next ($request, $response);
    }    
}
