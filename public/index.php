<?php


/*
* Load header
* Load configuration
* Load helper
* Load session, errors, servers
* Load database, model
* Load request,controller , response, route
* Load api
* Load shutdown
*/

define('_PATH_APPS_', $_SERVER['DOCUMENT_ROOT'] . '/../');

define('_SYSTEM_DIR_', 'system/');
define('_CONFIG_DIR_', 'config/');

define('_DB_DIR_', 'db/');
define('_WEB_DIR_', 'web/');
define('_MODEL_DIR_', 'model/');
define('_CONTROLLER_DIR_', 'controller/');
define('_EXT_PHP_', '.php');
define('_PUBLIC_DIR_', 'public/');
define('_VIEW_DIR_', _WEB_DIR_ . 'view/');


include _PATH_APPS_ . _CONFIG_DIR_ . 'header.php';

include _PATH_APPS_  . _CONFIG_DIR_ . 'app.php';
include _PATH_APPS_  . _SYSTEM_DIR_ . 'header.php';
include _PATH_APPS_  . _SYSTEM_DIR_ . 'helper.php';

if (_MAINTENANCE_) {
    _json([
        'result' => false,
        'message' => 'Sorry, Application is maintenance'
    ]);
}

switch (_ERRORS_) {
    case true:
        error_reporting(E_ALL);
        break;
    case false:
        error_reporting(0);
        break;
    default:
        error_reporting(0);
        break;
}

_include(_PATH_APPS_  . _SYSTEM_DIR_ . 'session');
_include(_PATH_APPS_  . _SYSTEM_DIR_ . 'server');
_include(_PATH_APPS_  . _SYSTEM_DIR_ . 'errors');
_include(_PATH_APPS_  . _SYSTEM_DIR_ . 'booting');

_include(_PATH_APPS_  . _CONFIG_DIR_ . 'database');
_include(_PATH_APPS_  . _DB_DIR_ . 'db');
_include(_PATH_APPS_  . _DB_DIR_ . 'MouxModel');

_include(_PATH_APPS_  . _SYSTEM_DIR_ . 'terminal');
_include(_PATH_APPS_  . _SYSTEM_DIR_ . 'request');
_include(_PATH_APPS_  . _SYSTEM_DIR_ . 'response');
_include(_PATH_APPS_  . _SYSTEM_DIR_ . 'controller');
_include(_PATH_APPS_  . _SYSTEM_DIR_ . 'route');
_include(_PATH_APPS_  . _WEB_DIR_ . 'api');
_include(_PATH_APPS_  . _SYSTEM_DIR_ . 'shutdown');


$s = new Shutdown;
$s->start();
