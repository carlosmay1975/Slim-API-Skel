
# Slim-API-Skel

A basic Slim 3.0 boiler plate with support for Token based Authentication.

Token authentication based off of https://github.com/Swader/REST


```
./app/config.yml           # Configuration file
./app/dependencies.php     # Set up dependencies
./app/idiorm.php           # Configure Idiorm
./app/middleware.php       # Set up Middlewares
./app/routes.php           # Routes, probably better split into multiple files.
./bootstrap.php            # Put everything together.
./composer.json            # Packages and autoloader config.
./log                      # Target for monolog
./src                      # Our code
./views                    # Twig templates
./web                      # Point Apache/NGX here.

```

## Get Composer:
http://getcomposer.org

## Installation:
```
$ git clone https://github.com/carlosmay1975/Slim-API-Skel <target_folder>
$ composer install
```

