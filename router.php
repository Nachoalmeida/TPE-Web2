<?php
require_once 'controllers/cars.controller.php';
require_once 'controllers/admin.controller.php';
require_once 'controllers/auth.controller.php';
require_once 'controllers/user.controller.php';

// definimos la base url de forma dinamica
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

// define una acción por defecto
if (empty($_GET['action'])) {
    $_GET['action'] = 'inicio';
}

// toma la acción que viene del usuario y parsea los parámetros
$accion = $_GET['action'];
$parametros = explode('/', $accion);

// decide que camino tomar según TABLA DE RUTEO
switch ($parametros[0]) {

        //PARTE PUBLICA*****************************************************************************

    case 'inicio':
        // instanciando un objeto de la clase CarsController
        $controller = new CarsController();
        $controller->showCars();
        break;

    case 'ver_mas':   // ver_mas/:id
        $controller = new CarsController();
        $controller->showCar($parametros[1]);
        break;

    case 'marca':
        $controller = new CarsController();
        $controller->showCarsByBrand($parametros[1]);
        break;

    case 'ingresar':
        // instanciando un objeto de la clase AuthController
        $controller = new AuthController();
        $controller->showFormLogin();
        break;

    case 'registrarse':
        // instanciando un objeto de la clase AuthController
        $controller = new AuthController();
        $controller->showFormSingUp();
        break;

    case 'comprar':
        $controller = new CarsController();
        $controller->showFormBuy();
        break;

        //FIN PARTE PUBLICA************************************************************************************

        //AUTENTICACION*****************************************************************************************

    case 'logueo':
        // instanciando un objeto de la clase AuthController
        $controller = new AuthController();
        $controller->login();
        break;

    case 'salir':
        // instanciando un objeto de la clase AuthController
        $controller = new AuthController();
        $controller->logout();
        break;

    case 'nuevo_usuario':
        // instanciando un objeto de la clase AuthController
        $controller = new AuthController();
        $controller->SignUp();
        break;

        //AUTENTICACION******************************************************************************************

        //PARTE PRIVADA ADMINISTRADOR*****************************************************************************

    case 'nueva_marca':
        // instanciando un objeto de la clase AdminController
        $controller = new AdminController();
        $controller->showFormAddBrand();
        break;

    case 'crear_marca':
        // instanciando un objeto de la clase AdminController
        $controller = new AdminController();
        $controller->addBrand();
        break;

    case 'editar_marca':
        // instanciando un objeto de la clase AdminController
        $controller = new AdminController();
        $controller->showFormEditBrand($parametros[1]);
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

    case 'eliminar_usuario':
        // instanciando un objeto de la clase AdminController
        $controller = new AdminController();
        $controller->deleteUser();
        break;

    case 'modificar_permiso':
        // instanciando un objeto de la clase AdminController
        $controller = new AdminController();
        $controller->modifyRole();
        break;


        //FIN PARTE PRIVADA ADMINISTRADOR*****************************************************************************


        //PARTE PRIVADA usuario*****************************************************************************

    case 'administrador': // /ABM panel
        // instanciando un objeto de la clase UserController
        $controller = new UserController();
        $controller->showABMPanel();
        break;

    case 'nuevo_auto': // Dirige los datos del formulario al controller.    
        $controller = new UserController();
        $controller->addCar();
        break;

    case 'nueva_publicacion': //  formulario   ->   showForm()
        // instanciando un objeto de la clase UserController
        $controller = new UserController();
        $controller->ShowAddCarForm();
        break;

    case 'eliminar_publicacion':
        // instanciando un objeto de la clase UserController
        $controller = new UserController();
        $controller->deleteCar();
        break;

    case 'editar_publicacion':
        // instanciando un objeto de la clase UserController
        $controller = new UserController();
        $controller->showFormEditCars($parametros[1]);
        break;

    case 'editar_auto':
        // instanciando un objeto de la clase UserController
        $controller = new UserController();
        $controller->editCar();
        break;

    case 'eliminar_foto':
        // instanciando un objeto de la clase UserController
        $controller = new UserController();
        $controller->deletePhoto($parametros[1], $parametros[2]);
        break;

        //FIN PARTE PRIVADA usuario*****************************************************************************


    default:
        $controller = new CarsController();
        $controller->showURLFail();
        break;
}
