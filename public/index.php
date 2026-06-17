<?php
session_start();

define('ROOT', dirname(__DIR__));

require ROOT . '/core/Router.php';
require ROOT . '/core/helpers.php';
require ROOT . '/core/db.php';

require ROOT . '/app/models/Home.php';
require ROOT . '/app/models/Events.php';
require ROOT . '/app/models/Login.php';
require ROOT . '/app/models/Account.php';
require ROOT . '/app/models/Admin.php';

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/events', 'EventsController@index');
$router->get('/events/{id}', 'EventsController@category');
$router->get('/events/buy/{id}', 'EventsController@buy');
$router->post('/events/buy', 'EventsController@buyticket');
$router->get('/register', 'RegisterController@index');
$router->post('/register', 'RegisterController@register');
$router->get('/login', 'LoginController@index');
$router->post('/login', 'LoginController@login');
$router->get('/account', 'AccountController@index');
$router->get('/account/inactivetickets', 'AccountController@inactivetickets');
$router->get('/account/ticket/{id}', 'AccountController@ticket');
$router->get('/logout', 'LogoutController@index');
$router->get('/admin', 'AdminController@index');
$router->get('/admin/addevent', 'AdminController@addevent');
$router->post('/admin/addevent', 'AdminController@form');
$router->get('/admin/scanner', 'ScannerController@index');
$router->post('/admin/scanner/check', 'ScannerController@check');

$router->dispatch($_SERVER['REQUEST_URI']);