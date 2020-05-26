<?php
require_once 'models/cars.model.php';
require_once 'models/brands.model.php';
require_once 'views/admin.view.php';
require_once 'views/fail.view.php';
require_once 'helper/session.helper.php';

class AdminController {
    private $carsModel;
    private $brandsModel;
    private $adminView;
    private $failView;

    public function __construct() {
       HelperSession::access();
       $this->carsModel = new CarsModel();
       $this->brandsModel = new BrandsModel();
       //pido las marcas al modelo
       $brands = $this->brandsModel->getAllBrands();
       $this->adminView  = new AdminView($brands, true);
       $this->failView = new FailView($brands, true);
    }    
    public function showABMPanel(){
        // traigo los autos
        $cars=$this->carsModel -> getAllCars();
        //traigo el nombre del usuario
        $user=$_SESSION['user'];
        // actualizo la vista
        $this->adminView->show_ABMpanel_view( $cars,$user);
    }
    public function ShowAddCarForm() {
        // tomo el año actual
        $year=date("Y");
        // actualizo la vista
        $this->adminView->show_form_view( $year);
    }
    function addCar() {
        // toma los valores enviados por el formulario
        $title = $_POST['titulo'];
        $model = $_POST['modelo'];
        $year = $_POST['anio'];
        $kilometers = $_POST['kilometros'];
        $price = $_POST['precio'];
        $description = $_POST['descripcion'];
        $photo = $_POST['foto'];
        $brand_name = $_POST['nombre_marca'];
        //preguntar por todas, nunca van solo a nivel front-end
        if (!isset ($title) && !isset ($model) && !isset ($year) && !isset ($kilometers)  && !isset ($price) && !isset ($description) && !isset ($photo) && !isset ($brand_name)){
            header("Location: " . BASE_URL . "administrador");
            die;
        }
        // inserta en la DB y redirige
        $success = $this->carsModel->insertCar($title, $model, $year, $kilometers, $price, $description, $photo, $brand_name);
        if($success)
            header('Location: ' . BASE_URL . "administrador");
        else
            $this->failView->show_fail('Error al agregar el registro');

    }
    public function deleteCar(){
        // traigo el id de del auto, del value del boton, con en name id_auto_eliminar
        $id_car=$_POST['id_auto_eliminar'];
        // traigo los autos
        $detelecar=$this->carsModel -> deleteCar($id_car);
        // actualizo la vista
        if($detelecar)
            header('Location: ' . BASE_URL . 'administrador');
        else
            $this->failView->show_fail('No se pudo eliminar! Revise su conexión');
    }
    public function editCar(){
        // traigo el id de del auto, del value del boton, con en name id_auto_editar
        $id_car=$_POST['id_auto_editar'];
        // toma los valores enviados por el formulario
        $title = $_POST['titulo'];
        $model = $_POST['modelo'];
        $year = $_POST['anio'];
        $kilometers = $_POST['kilometros'];
        $price = $_POST['precio'];
        $description = $_POST['descripcion'];
        $photo = $_POST['foto'];
        $brand_name = $_POST['nombre_marca'];
        if (!isset ($title) && !isset ($model) && !isset ($year) && !isset ($kilometers)  && !isset ($price) && !isset ($description) && !isset ($photo) && !isset ($brand_name)){
            header("Location: " . BASE_URL . "administrador");
            die;
        }
        // edito del auto
        $editcar=$this->carsModel -> editCar($id_car,$title, $model, $year, $kilometers, $price, $description, $photo,$brand_name);
        // actualizo la vista
        if($editcar)
            header('Location: ' . BASE_URL . 'administrador');
        else
            $this->failView->show_fail('No se pudo editar! Revise su conexión');
    }
    public function showFormEditCars($id_car){
        // traigo los autos
        $car=$this->carsModel -> getCar($id_car);
        // tomo el año actual
        $year=date("Y");
        // actualizo la vista
        $this->adminView->show_form_edit( $car, $id_car, $year);
    }
    public function showFormAddBrand(){
        // actualizo la vista
        $this->adminView->form_add_brand();
    }
    public function addBrand(){
        $brand_name = $_POST['nombre_marca'];
        if (!isset ($brand_name)){
            header("Location: " . BASE_URL . "administrador");
            die;
        }
        // agrego la nueva marca
        $addBrands=$this->brandsModel->insertBrand($brand_name);
        if($addBrands)
            header('Location: ' . BASE_URL . 'administrador');
        else
            $this->failView->show_fail('No se pudo agregar! Revise su conexión');
    }
    public function showFormEditBrand($id_brand){
        // traigo la marca
        $brand=$this->brandsModel -> getBrand($id_brand);
        // actualizo la vista
        $this->adminView->form_edit_brand( $brand);
    }
    public function editBrand(){
        // toma los valores enviados por el formulario
        $brand_name = $_POST['nombre_marca'];
        // traigo el id de la marca, del value del boton, con el name id_marca
        $id_brand=$_POST['id_marca'];
        if (!isset ($brand_name) && !isset ($id_brand)){
            header("Location: " . BASE_URL . "administrador");
            die;
        }
        // edito la marca
        $editbrand=$this->brandsModel -> editBrand($id_brand,$brand_name);
        // actualizo la vista
        if($editbrand)
            header('Location: ' . BASE_URL . 'administrador');
        else
            $this->failview->show_fail('No se pudo editar! Revise su conexión');
    }
    public function deleteBrand(){
        // traigo el id de del auto, del value del boton, con en name id_auto_eliminar
        $id_brand=$_POST['id_marca_eliminar'];
        if (!isset ($id_brand)){
            header("Location: " . BASE_URL . "administrador");
            die;
        }
        // elimino la marca
        $detelebrand=$this->brandsModel -> deleteBrand($id_brand);
        // actualizo la vista
        if($detelebrand)
            header('Location: ' . BASE_URL . 'administrador');
        else
            $this->failView->show_fail('No se pudo eliminar! Revise su conexión');
    }   
}