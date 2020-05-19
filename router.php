<?php
    //require_once 'lib/tasks.php';
    require_once 'controllers/cars.controller.php';
    require_once 'controllers/admin.controller.php';

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
        case 'inicio': 
            // instanciando un objeto de la clase CarsController
            $controller = new CarsController();
            $controller->showCars();
        break;

        case 'ver_mas':   // ver_mas/id
            $controller = new CarsController();
            $controller->showCar($parametros[1]);
        break;

        case 'administrador': // /ABM panel
            // instanciando un objeto de la clase AdminController
            $controller = new AdminController();
            $controller->showABMPanel();
        break;

        case 'nuevo_auto': // Dirige los datos del formulario al controller.    
            $controller = new AdminController();
            $controller->addCar();
        break;

        case 'marca':    
            $controller = new CarsController();
            $controller->showCarsByBrand($parametros[1]);
        break;

        case 'nueva_publicacion': //  formulario   ->   showForm()
            // instanciando un objeto de la clase AdminController
            $controller = new AdminController();
            $controller->showForm();
        break;

        case 'eliminar_publicacion':
            // instanciando un objeto de la clase AdminController
            $controller = new AdminController();
            $controller->deleteCar();
        break;

        case 'editar_publicacion':
            // instanciando un objeto de la clase AdminController
            $controller = new AdminController();
            $controller->showFormEditCars($parametros[1]);
        break;

        case 'editar_auto':
            // instanciando un objeto de la clase AdminController
            $controller = new AdminController();
            $controller->editCar();
        break;

        case 'nueva_marca':
            // instanciando un objeto de la clase AdminController
            $controller = new AdminController();
            $controller->formAddBrand();
        break;

        case 'crear_marca':
            // instanciando un objeto de la clase AdminController
            $controller = new AdminController();
            $controller->addBrand();
        break;

        case 'editar_marca':
            // instanciando un objeto de la clase AdminController
            $controller = new AdminController();
            $controller->formEditBrand($parametros[1]);
        break;

        case 'cargar_marca_editada':
            // instanciando un objeto de la clase AdminController
            $controller = new AdminController();
            $controller->editBrand();
        break;

        case 'eliminar_marca':
            // instanciando un objeto de la clase AdminController
            $controller = new AdminController();
            $controller->deleteBrand();
        break;


        default: 
            $controller = new CarsController();
            $controller->showURLFail();
        break;
    }