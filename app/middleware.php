<?php

## Authenticate calls against an API Key
$app->add(new API\Middleware\TokenOverBasicAuth(function($token) {
        if (!strlen($token)) {
            return false;
        }
    
        $row = \ORM::forTable('keys')->where('apikey', $token)->findOne();
    
        return $row ? true : false;
    },
    '/api')
);

