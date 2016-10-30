<?php
namespace API\Helpers;

use \Slim\Middleware\HttpBasicAuthentication\AuthenticatorInterface;

class IdiormAuthenticator implements AuthenticatorInterface {
    public function __invoke(array $arguments) {
        if (!strlen($arguments['user'])) {
            return false;
        }
        
        $row = \ORM::forTable('keys')->where('apikey', $arguments['user'])->findOne();
        
        return $row ? true : false;
    }
}