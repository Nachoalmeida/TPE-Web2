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
        // traigo las marcas
        $brands=$this->brandsModel->getAllBrands();
        // tomo el año actual
        $year=date("Y");

        // actualizo la vista
        $this->view->show_form_view($brands, $year);

    }


    function addCar() {

        // traigo las marcas
        $brands=$this->brandsModel->getAllBrands();

        // toma los valores enviados por el formulario
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
            $this->failview->show_fail('Faltan datos Obligatorios!!',$brands);
            die();
        }

        // inserta en la DB y redirige
        $success = $this->carsModel->insertCar($titulo, $modelo, $anio, $kilometros, $precio, $descripcion, $foto, $nombre_marca);

        if($success)
            header('Location: ' . BASE_URL . "inicio");
        else
            $this->failview->show_fail('Error al agregar el registro',$brands);

    }

    public function deleteCars(){
        // traigo el id de del auto, del value del boton, con en name id_auto_eliminar
        $id_car=$_POST['id_auto_eliminar'];
        // traigo las marcas
        $brands=$this->brandsModel->getAllBrands();
        // traigo los autos
        $detelecar=$this->carsModel -> deleteCar($id_car);
        // actualizo la vista
        if(!$detelecar)
            header('Location: ' . BASE_URL . 'administrador');
        else
            $this->failview->show_fail('No se pudo eliminar! Revise su conexión',$brands);
    }

    public function editCar(){
        // traigo el id de del auto, del value del boton, con en name id_auto_editar
        $id_car=$_POST['id_auto_editar'];
        // toma los valores enviados por el formulario
        $titulo = $_POST['titulo'];
        $modelo = $_POST['modelo'];
        $anio = $_POST['anio'];
        $kilometros = $_POST['kilometros'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $foto = $_POST['foto'];
        $nombre_marca = $_POST['nombre_marca'];

        // traigo las marcas
        $brands=$this->brandsModel->getAllBrands();
        // edito del auto
        $editcar=$this->carsModel -> editCar($id_car,$titulo, $modelo, $anio, $kilometros, $precio, $descripcion, $foto,$nombre_marca);
        // actualizo la vista
        if($editcar)
            header('Location: ' . BASE_URL . 'administrador');
        else
            $this->failview->show_fail('No se pudo editar! Revise su conexión',$brands);
    }
    public function showFormEditCars($id_car){
        // traigo las marcas
        $brands=$this->brandsModel->getAllBrands();
        // traigo los autos
        $car=$this->carsModel -> getCar($id_car);
        // tomo el año actual
        $year=date("Y");

        // actualizo la vista
        $this->view->show_form_edit($brands, $car, $id_car, $year);

    }
    public function formAddBrand(){
        // traigo las marcas
        $brands=$this->brandsModel->getAllBrands();
        // actualizo la vista
        $this->view->form_add_brand($brands);
    }
    public function addBrand(){
        $nombre_marca = $_POST['nombre_marca'];

        // traigo las marcas
        $brands=$this->brandsModel->getAllBrands();

        // agrego la nueva marca
        $addBrands=$this->brandsModel->insertBrand($nombre_marca);

        if($addBrands)
            header('Location: ' . BASE_URL . 'administrador');
        else
            $this->failview->show_fail('No se pudo agregar! Revise su conexión',$brands);
    }

    
}