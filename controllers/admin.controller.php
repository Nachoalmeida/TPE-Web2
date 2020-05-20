<?php

require_once 'models/cars.model.php';
require_once 'models/brands.model.php';
require_once 'views/admin.view.php';
require_once 'views/fail.view.php';

class AdminController {
    private $carsModel;
    private $brandsModel;
    private $adminView;
    private $failView;

    public function __construct() {
       $this->carsModel = new CarsModel();
       $this->brandsModel = new BrandsModel();
       $this->adminView = new AdminView();
       $this->failView = new FailView();
       $this->access();
    }    
    public function showABMPanel(){
        // traigo las marcas
        $brands=$this->brandsModel->getAllBrands();
        // traigo los autos
        $cars=$this->carsModel -> getAllCars();

        // actualizo la vista
        $this->adminView->show_ABMpanel_view($brands, $cars);
    }

    public function showForm() {
        // traigo las marcas
        $brands=$this->brandsModel->getAllBrands();
        // tomo el año actual
        $year=date("Y");

        // actualizo la vista
        $this->adminView->show_form_view($brands, $year);
    }
    function addCar() {
        // toma los valores enviados por el formulario
        $title = $_POST['titulo'];
        $model = $_POST['modelo'];
        $year = $_POST['anio'];
        $kilometres = $_POST['kilometros'];
        $price = $_POST['precio'];
        $description = $_POST['descripcion'];
        $photo = $_POST['foto'];
        $brand_name = $_POST['nombre_marca'];

        // inserta en la DB y redirige
        $success = $this->carsModel->insertCar($title, $model, $year, $kilometres, $price, $description, $photo, $brand_name);

        if($success)
            header('Location: ' . BASE_URL . "administrador");
        else
           // traigo las marcas
           $brands=$this->brandsModel->getAllBrands();
            $this->failView->show_fail('Error al agregar el registro',$brands);

    }
    public function deleteCar(){
        // traigo el id de del auto, del value del boton, con en name id_auto_eliminar
        $id_car=$_POST['id_auto_eliminar'];
        // traigo los autos
        $detelecar=$this->carsModel -> deleteCar($id_car);
        // actualizo la vista
        if(!$detelecar)
            header('Location: ' . BASE_URL . 'administrador');
        else
            // traigo las marcas
            $brands=$this->brandsModel->getAllBrands();
            $this->failView->show_fail('No se pudo eliminar! Revise su conexión',$brands);
    }
    public function editCar(){
        // traigo el id de del auto, del value del boton, con en name id_auto_editar
        $id_car=$_POST['id_auto_editar'];
        // toma los valores enviados por el formulario
        $title = $_POST['titulo'];
        $model = $_POST['modelo'];
        $year = $_POST['anio'];
        $kilometres = $_POST['kilometros'];
        $price = $_POST['precio'];
        $description = $_POST['descripcion'];
        $photo = $_POST['foto'];
        $brand_name = $_POST['nombre_marca'];

        // edito del auto
        $editcar=$this->carsModel -> editCar($id_car,$title, $model, $year, $kilometres, $price, $description, $photo,$brand_name);
        // actualizo la vista
        if($editcar)
            header('Location: ' . BASE_URL . 'administrador');
        else
            // traigo las marcas
            $brands=$this->brandsModel->getAllBrands();
            $this->failView->show_fail('No se pudo editar! Revise su conexión',$brands);
    }
    public function showFormEditCars($id_car){
        // traigo las marcas
        $brands=$this->brandsModel->getAllBrands();
        // traigo los autos
        $car=$this->carsModel -> getCar($id_car);
        // tomo el año actual
        $year=date("Y");

        // actualizo la vista
        $this->adminView->show_form_edit($brands, $car, $id_car, $year);
    }
    public function formAddBrand(){
        // traigo las marcas
        $brands=$this->brandsModel->getAllBrands();
        // actualizo la vista
        $this->adminView->form_add_brand($brands);
    }
    public function addBrand(){
        $brand_name = $_POST['nombre_marca'];

        // traigo las marcas
        $brands=$this->brandsModel->getAllBrands();

        // agrego la nueva marca
        $addBrands=$this->brandsModel->insertBrand($brand_name);

        if($addBrands)
            header('Location: ' . BASE_URL . 'administrador');
        else
            $this->failView->show_fail('No se pudo agregar! Revise su conexión',$brands);
    }
    public function formEditBrand($id_brand){
        // traigo las marcas
        $brands=$this->brandsModel->getAllBrands();
        // traigo la marca
        $brand=$this->brandsModel -> getBrand($id_brand);

        // actualizo la vista
        $this->adminView->form_edit_brand($brands, $brand);

    }
    public function editBrand(){
        // traigo el id de la marca, del value del boton, con el name id_marca
        $id_brand=$_POST['id_marca'];
        // toma los valores enviados por el formulario
        $brand_name = $_POST['nombre_marca'];

        // edito la marca
        $editbrand=$this->brandsModel -> editBrand($id_brand,$brand_name);
        // actualizo la vista
        if($editbrand)
            header('Location: ' . BASE_URL . 'administrador');
        else
            // traigo las marcas
            $brands=$this->brandsModel->getAllBrands();
            $this->failview->show_fail('No se pudo editar! Revise su conexión',$brands);
    }

    public function deleteBrand(){
        // traigo el id de del auto, del value del boton, con en name id_auto_eliminar
        $id_brand=$_POST['id_marca_eliminar'];
        
        // traigo los autos
        $detelebrand=$this->brandsModel -> deleteBrand($id_brand);
        // actualizo la vista
        if(!$detelebrand)
            header('Location: ' . BASE_URL . 'administrador');
        else
            // traigo las marcas
            $brands=$this->brandsModel->getAllBrands();
            $this->failView->show_fail('No se pudo eliminar! Revise su conexión',$brands);
    }
    private function access(){
        session_start();
        //preguntar, sin el isset an igual???por que??
        if (!isset($_SESSION['logged'])){
            header('Location: ' . BASE_URL . 'ingresar');
            die; 
        }

    }

    
}