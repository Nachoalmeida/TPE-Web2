<?php
require_once 'models/cars.model.php';
require_once 'models/brands.model.php';
require_once 'models/photo.model.php';
require_once 'views/admin.view.php';
require_once 'views/fail.view.php';
require_once 'helper/session.helper.php';

class UserController {

    private $carsModel;
    private $brandsModel;
    private $photoModel;
    private $adminView;
    private $failView;
    private $user_id;
    private $userChecked;
    private $userName;
    private $userPhoto;

    public function __construct() {
       HelperSession::access();
       $this->carsModel = new CarsModel();
       $this->brandsModel = new BrandsModel();
       $this->photoModel = new PhotoModel();
       //pido las marcas al modelo
       $brands = $this->brandsModel->getAllBrands();
       $this->adminView  = new AdminView($brands);
       $this->failView = new FailView($brands);
       $this->user_id = $_SESSION['user_id'];
       $this->userChecked = $_SESSION['admin'];
       $this->userName = $_SESSION['user'];
       $this->userPhoto = $_SESSION['photo'];
    }    

    public function showABMPanel(){
        // traigo los autos
        $userChecked=$this->userChecked;
        $user_id=$this->user_id;  
        //si es adming puede ver todo sion solo ve sus publicaciones
        if ($userChecked){
        $cars=$this->carsModel -> getAllCars();
        }
        else $cars=$this->carsModel -> getCarsByUser($user_id);

        //traigo el nombre del usuario
        $userName=$this->userName;
        $photo=$this->userPhoto;
        // actualizo la vista
        $this->adminView->show_ABMpanel_view( $cars,$userName,$photo);
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
        $brand_name = $_POST['nombre_marca'];

        //la unica que se me ocurrio para saber si tiene algo el file o no 
        foreach($_FILES["imagesToUpload"]["tmp_name"] as $key => $tmp_name)
    
        //preguntar por todas, nunca van solo a nivel front-end
        if (empty ($title) || empty ($model) || empty ($year) || empty ($price) || empty ($description) || empty ($brand_name) || !$tmp_name){
            $this->failView->show_fail('Faltan Datos!!');
            die;
        }
        //traigo el ID del usuario, para saber de quien es la publicacion.
        $user= $this->user_id;

        // inserta en la DB y redirige
        $success = $this->carsModel->insertCar($title, $model, $year, $kilometers, $price, $description,$brand_name,$user);

        //PREGUNTAR SI ESTA BIEN, ASI
        if($success){
            $success_img =$this->addPhotos($success);
        }
        
        if($success && $success_img)
            header('Location: ' . BASE_URL . "administrador");
        else
            $this->failView->show_fail('Error al agregar el registro');

    }

    public function deleteCar(){
        // traigo el id de del auto, del value del boton, con en name id_auto_eliminar
        $id_car=$_POST['id_auto_eliminar'];

        if (empty ($id_car)){
            header("Location: " . BASE_URL . "administrador");
            die;
        }

        $this->userPrivileges($id_car);

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
        $brand_name = $_POST['nombre_marca'];

        if (empty ($title) || empty ($model) || empty ($year) || empty ($price) || empty ($description) || empty ($brand_name) || empty ($id_car)){
            $this->failView->show_fail('Faltan Datos!!');
            die;
        }
        //traigo las fotos del auto, para verificar que tiene foto subida
        $photos=$this->photoModel ->getPhotosByCar($id_car);

        if (!$photos){
             //ejecuto un for para saber si subio alguna  
            foreach($_FILES["imagesToUpload"]["tmp_name"] as $key => $tmp_name);
            if (!$tmp_name){
                $this->failView->show_fail('Faltan las fotos!');
                die;
            }
        }
        if ($photos){
        //ejecuto un for para saber si subio alguna  
        foreach($_FILES["imagesToUpload"]["tmp_name"] as $key => $tmp_name);
        }
        $photos=1;

        //chequeo los privilegios del usuario, si puede o no editar
        $this->userPrivileges($id_car);

        // edito del auto
        $editcar=$this->carsModel -> editCar($id_car,$title, $model, $year, $kilometers, $price, $description, $brand_name);

        //PREGUNTAR SI ESTA BIEN, ASI
        if($tmp_name && $id_car){
            $photos =$this->addPhotos($id_car);
        }
        
        // actualizo la vista
        if($editcar && $photos)
            header('Location: ' . BASE_URL . 'administrador');
        else
            $this->failView->show_fail('No se pudo editar! Revise su conexión');
    }

    public function showFormEditCars($id_car){

        //chequeo los privilegios del usuario, si puede o no editar
        $this->userPrivileges($id_car);

        // traigo el auto
        $car=$this->carsModel -> getCar($id_car);

        //traigo las fotos del auto
        $photos=$this->photoModel ->getPhotosByCar($id_car);

        // tomo el año actual
        $year=date("Y");
        //titulo
        $titulo= 'Editar Publicación';
        // actualizo la vista
        $this->adminView->show_form_view($year,$titulo, $car,$photos);
    }

    //ELIMINAR UNA FOTO DE LAS PUBLICACIONES
    public function deletePhoto($id_foto,$id_car){

        //verifico que vengan los datos solicitados 
        if (empty ($id_foto) || empty ($id_car)){
            header("Location: " . BASE_URL . "administrador");
            die;
        }

        //chequeo los privilegios del usuario, si puede o no manipular la publicacion
        $this->userPrivileges($id_car);

        //traigo las fotos del auto
        $photos=$this->photoModel ->deletePhoto($id_foto);

        //PREGUNTART SI ESTA BIEN ESTO  
        if($photos){
            $referencia= $_SERVER['HTTP_REFERER'];
            header ("Location: ".$referencia);}
        else
        $this->failView->show_fail('No se pudo eliminar la foto! Revise su conexión');
    }

    //FUNCION QUE NO PERMITE A LOS USUARIOS manipular publicaciones de otros usuarios
    private function userPrivileges($car_id){

        $user_id = $this->user_id;
        $userChecked = $this->userChecked;

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
            $this->failView->show_fail('La publicacion no es de su propiedad');
            die;
        }
    }

    private function addPhotos($success){
        //si algo sale mal tira false, sino cambia a true
        $success_img=false;
        //recorremos el arreglo
        foreach($_FILES["imagesToUpload"]["tmp_name"] as $key => $tmp_name)
        {
            //pregunta si es del formato que aceptamos
            if (($_FILES['imagesToUpload']['type'][$key] == "image/jpg" || 
                $_FILES['imagesToUpload']['type'] [$key]== "image/jpeg" || 
                $_FILES['imagesToUpload']['type'] [$key] == "image/png")) {

                $originalName = $_FILES["imagesToUpload"]["name"][$key];
                $success_img=$this->photoModel ->insertByCar($success,$originalName,$tmp_name);
                
            }
        }
        return $success_img;
       
    }
}