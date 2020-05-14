<?php

require_once 'models/cars.model.php';
require_once 'models/brands.model.php';
require_once 'views/admin.view.php';
require_once 'views/fail.view.php';

class AdminController {
    private $carsModel;
    private $brandsModel;
    private $view;
    private $failview;

    public function __construct() {
       $this->carsModel = new CarsModel();
       $this->brandsModel = new BrandsModel();
       $this->view = new AdminView();
       $this->failview = new FailView();

    }


    public function showABMPanel(){
        // traigo las marcas
        $brands=$this->brandsModel->getAllBrands();
        // traigo los autos
        $cars=$this->carsModel -> getAllCars();

        // actualizo la vista
        $this->view->show_ABMpanel_view($brands, $cars);
    }

    public function showForm() {

        $brands=$this->brandsModel->getAllBrands();
        // actualizo la vista
        $this->view->show_form_view($brands);

    }


    function addCar() {
        // toma los valores enviados por el admin
        $titulo = $_POST['titulo'];
        $modelo = $_POST['modelo'];
        $anio = $_POST['anio'];
        $kilometros = $_POST['kilometros'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $foto = $_POST['foto'];
        $nombre_marca = $_POST['nombre_marca'];
    
        // verifica los datos obligatorios
        if (empty($titulo) || empty($modelo) || empty($precio) || empty($nombre_marca)) {
            //$this->view->showError("Faltan datos obligatorios");
            echo "error temporal hasta tener showError, faltan datos";
            die();
        }

        // inserta en la DB y redirige
        $success = $this->model->insertCar($titulo, $modelo, $anio, $kilometros, $precio, $descripcion, $foto, $nombre_marca);

        if($success)
            header('Location: ' . BASE_URL . "inicio");
        else
            //$this->view->showError("Error al agregar el registro");
            echo "error temporal hasta tener showError, no se subieron los datos";

    }

    public function deleteCars(){
        $id_car=$_POST['id_auto'];
        // traigo las marcas
        $brands=$this->brandsModel->getAllBrands();
        // traigo los autos
        $detelecar=$this->carsModel -> deleteCar($id_car);
        // actualizo la vista
        if(!$detelecar)
            header('Location: ' . BASE_URL . "administrador");
        else
            //$this->view->showError("Error al agregar el registro");
            $this->failview->show_fail('No se pudo eliminar! revise su conexion',$brands);
    }

}