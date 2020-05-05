<?php
    //require_once 'lib/tasks.php';
    require_once 'controllers/cars.controller.php';

    // definimos la base url de forma dinamica
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    // define una acción por defecto
    if (empty($_GET['action'])) {
        $_GET['action'] = 'inicio';
    } 

    // toma la acción que viene del usuario y parsea los parámetros
    $accion = $_GET['action']; 
    $parametros = explode('/', $accion);
    //var_dump($parametros); die; // like console.log();

    // decide que camino tomar según TABLA DE RUTEO
    switch ($parametros[0]) {
        case 'inicio': // /listar   ->   showTasks()
            // instanciando un objeto de la clase TaskController
            $controller = new CarsController();
            $controller->showCars();
        break;

        default: 
            echo "404 not found";
        break;
    }