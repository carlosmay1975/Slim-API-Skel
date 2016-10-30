<?php

$c = $app->getContainer();

$c['errorHandler'] = function ($c) {
    return function ($request, $response, $exception) use ($c) {
        
        $status = ['status' => 'error', 'error_description' => 'Internal server error'];
        
        $c["logger"]->error($exception->getMessage());
        return $c['response']
            ->withStatus(500)
            ->withJSON($status);
    };
};

$c['phpErrorHandler'] = function ($c) {
    return function ($request, $response, $exception) use ($c) {
        
        $status = ['status' => 'error', 'error_description' => 'Internal server error'];
        
        $c["logger"]->error($exception->getMessage());
        return $c['response']
            ->withStatus(501)
            ->withJSON($status);
    };
};

$c['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        
        $status = ['status' => 'Path not found'];
        
        $c["logger"]->error("Path not found", $status);
        return $c['response']
            ->withStatus(404)
            ->withJSON($status);
    };
};
