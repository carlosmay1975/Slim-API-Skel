<?php

$app->get('/', 'API\Controllers\Main:render')
    ->setName('homepage');

$app->get('/api/version', 'API\Controllers\Main:version')
    ->setName('version');
