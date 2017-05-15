<?php
require_once('../app/core/Route.php');

$route = new Route();

/*========================================================================================
||
||    Buat route disini!
||
||    $route->make('url', 'controller', 'controller method', 'request method');
||
||========================================================================================
*/

$route->make('/login', 'AuthController', 'show', 'GET');

$route->make('/login', 'AuthController', 'attempt', 'POST');

$route->make('/mulai', 'Quiz', 'index', 'GET');

$route->make('/home/search/{id}/{name}', 'AuthController', 'show', 'GET');

$route->make('/home/search/{id}/{name}/edit', 'AuthController', 'show', 'GET');

$route->make('/home/search/{id}/{name}/haha', 'Haha', 'blow', 'GET');

$route->make('/bora/search/{id}/{name}/haha', 'Haha', 'bora', 'GET');

$route->make('/ora/search/{name}/haha', 'Haha', 'ora', 'GET');

$route->make('/form', 'home', 'show_form', 'GET');

$route->make('/form', 'home', 'handle_form', 'POST');

$route->make('/student/{id}', 'home', 'getStudent', 'GET');