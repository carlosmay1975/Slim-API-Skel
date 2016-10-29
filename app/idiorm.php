<?php

$__db = $app->getContainer()->get('settings')["database"];

ORM::configure('mysql:host=' . $__db['host'] . ';dbname=' . $__db["name"]);
ORM::configure('error_mode', PDO::ERRMODE_EXCEPTION);
ORM::configure('username', $__db['user']);
ORM::configure('password', $__db['password'] ?: '');
ORM::configure('return_result_sets', true);
ORM::configure('id_column_overrides', isset($__db["overrides"]) ? $__db["overrides"] : []);
