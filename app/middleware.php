<?php

use API\Helpers\IdiormAuthenticator;

$app->add(new \Slim\Middleware\HttpBasicAuthentication([
    "path" => "/api",
    "realm" => "Protected",
    "authenticator" => new IdiormAuthenticator(),
    "error" => function ($request, $response, $arguments) {
        $data = [];
        $data["status"] = "error";
        $data["message"] = $arguments["message"];
        return $response->withJSON($data);
    }
]));