<?php
namespace API\Helpers;

use Slim\Http\Response;

class FatalErrorHandler
{
    public static function register()
    {
        register_shutdown_function(__CLASS__ . '::handle');
    }
    
    public static function handle()
    {
        global $app;
        
        if ($last = error_get_last()) {
            $response = (new Response())
                ->withStatus(500, 'Internal Error')
                ->withJSON($last);
                
            $app->respond($response);
        }
    }
}
