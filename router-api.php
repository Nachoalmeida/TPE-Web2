<?php

require_once 'libs/router/Router.php';
require_once 'api/cars-api.controller.php';

// creo el ruteador usando la libreria externa
$router = new Router();

// creo la tabla de ruteo
$router->addRoute('tareas', 'GET', 'TaskApiController', 'getTasks');
$router->addRoute('tareas/:ID', 'GET', 'TaskApiController', 'getTask');
$router->addRoute('tareas/:ID', 'DELETE', 'TaskApiController', 'deleteTask');


// rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);