<?php
/*
 * IX Portal - Router Wifidog Portal used for authenticating users
 * Developed by Howard Liu <howard@ixnet.work>, License under MIT
 */

use Lib\Route;
use Lib\Exception as ExceptionHandler;

require 'autoloader.php';

if (!isset($_GET['action'])) {
    $_GET['action'] = 'index';
}

if ($_GET['action'] == 'cron') {
    define('PRIVATE', true);
}

try {
    require 'Include/Guard.php';

    Route::get('index', 'Controllers\\HomeController::showIndex');
    Route::get('ping', 'Controllers\\PingController::pong');

    Route::get('auth', 'Controllers\\PortalController::showAuth');
    Route::get('portal', 'Controllers\\PortalController::showPortal');
    Route::get('login', 'Controllers\\PortalController::showLogin');
    Route::post('login', 'Controllers\\PortalController::doLogin');
    Route::get('register', 'Controllers\\PortalController::showRegister');
    Route::post('register', 'Controllers\\PortalController::doRegister');
    Route::get('logout', 'Controllers\\PortalController::showLogout');

    Route::get('cron', 'Controllers\\CronController::run');

    throw new Exception("Route not found");
} catch (Exception $e) {
    ExceptionHandler::show($e);
}