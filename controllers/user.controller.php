<?php
require_once 'models/cars.model.php';
require_once 'models/brands.model.php';
require_once 'views/admin.view.php';
require_once 'views/fail.view.php';
require_once 'helper/session.helper.php';

class UserController {

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
       $this->adminView  = new AdminView($brands);
       $this->failView = new FailView($brands);
    }    

    public function showABMPanel(){
        // traigo los autos
        $cars=$this->carsModel -> getAllCars();
        //traigo el nombre del usuario
        $user=$_SESSION['user'];
        $photo=$_SESSION['photo'];
        // actualizo la vista
        $this->adminView->show_ABMpanel_view( $cars,$user,$photo);
    }

    public function ShowAddCarForm() {
        // tomo el año actual
        $year=date("Y");
        //titulo
        $titulo= 'Alta de Publicación';
        // actualizo la vista
        $this->adminView->show_form_view($year, $titulo);
    }

    public function addCar() {
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
        if (empty ($title) || empty ($model) || empty ($year) || empty ($kilometers)  || empty ($price) || empty ($description) || empty ($photo) || empty ($brand_name)){
            header("Location: " . BASE_URL . "administrador");
            die;
        }
        //traigo el ID del usuario, para saber de quien es la publicacion.
        $user=$_SESSION['user_id'];

        // inserta en la DB y redirige
        $success = $this->carsModel->insertCar($title, $model, $year, $kilometers, $price, $description, $photo, $brand_name,$user);
        if($success)
            header('Location: ' . BASE_URL . "administrador");
        else
            $this->failView->show_fail('Error al agregar el registro');

    }

    public function deleteCar(){
        // traigo el id de del auto, del value del boton, con en name id_auto_eliminar
        $id_car=$_POST['id_auto_eliminar'];

        $userChecked=$_SESSION['admin'];
        $this->userPrivileges($id_car,$userChecked);

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
        if (empty ($title) || empty ($model) || empty ($year) || empty ($kilometers)  || empty ($price) || empty ($description) || empty ($photo) || empty ($brand_name) || empty ($id_car)){
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
        //titulo
        $titulo= 'Editar Publicación';
        // actualizo la vista
        $this->adminView->show_form_view($year,$titulo, $car);
    }
    //FUNCION QUE NO PERMITE A LOS USUARIOS manipular publicaciones de otros usuarios
    private function userPrivileges($car_id,$userChecked){

        $user_id=$_SESSION['user_id'];   

        if (!$userChecked){
            $cars=$this->carsModel ->getCarsByUser($user_id);
            if ($cars){
                foreach ($cars as $car){  
                    if($car_id == $car->id_auto){
                        $userChecked = 1;
                    }
                }
            }
        }

        if (!$userChecked){
            $this->failView->show_fail('No tiene permisos para eliminar la publicacion');
            die;
        }
    }
}