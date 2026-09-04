<?php

/*
|--------------------------------------------------------------------------
| NOVA - CONFIGURACIÓN GENERAL
|--------------------------------------------------------------------------
*/

if (!defined('APP_NAME')) {
    define('APP_NAME', 'NOVA');
}

if (!defined('APP_DESCRIPTION')) {
    define('APP_DESCRIPTION', 'Cobros y Créditos');
}

if (!defined('APP_VERSION')) {
    define('APP_VERSION', '1.0.0');
}

/*
|--------------------------------------------------------------------------
| RUTAS DEL SISTEMA
|--------------------------------------------------------------------------
*/

if (!defined('ROOT_PATH')) {
    define(
        'ROOT_PATH',
        dirname(__DIR__)
    );
}

if (!defined('APP_PATH')) {
    define(
        'APP_PATH',
        ROOT_PATH . '/app'
    );
}

if (!defined('CONFIG_PATH')) {
    define(
        'CONFIG_PATH',
        ROOT_PATH . '/config'
    );
}

if (!defined('PUBLIC_PATH')) {
    define(
        'PUBLIC_PATH',
        ROOT_PATH . '/public'
    );
}

if (!defined('ROUTES_PATH')) {
    define(
        'ROUTES_PATH',
        ROOT_PATH . '/routes'
    );
}


/*
|--------------------------------------------------------------------------
| URL BASE
|--------------------------------------------------------------------------
*/

if (!defined('BASE_URL')) {
    define(
        'BASE_URL',
        '/nova'
    );
}


/*
|--------------------------------------------------------------------------
| ASSETS
|--------------------------------------------------------------------------
*/

if (!defined('ASSETS_URL')) {
    define(
        'ASSETS_URL',
        BASE_URL . '/public/assets'
    );
}


/*
|--------------------------------------------------------------------------
| SESIÓN
|--------------------------------------------------------------------------
*/

if (!defined('SESSION_NAME')) {
    define(
        'SESSION_NAME',
        'NOVA_SESSION'
    );
}


/*
|--------------------------------------------------------------------------
| ZONA HORARIA
|--------------------------------------------------------------------------
*/

date_default_timezone_set('America/Bogota');