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

        //Reviso que la publicacion exista
        $carExists= $this->carsModel ->getcar($id_car);

        //funcion chequea que sea una valor valido
        $this->broughtSomething($carExists, 'La publicacion no existe');

        //verifico los permisos del ususario
        $this->userPrivileges($id_car);

        // elimino el auto
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

            //funcion chequea que sea una valor valido
            $this->broughtSomething($tmp_name, 'Faltan las fotos!');
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
    public function deletePhoto($id_car,$id_foto){

        //verifico que vengan los datos solicitados 
        if (empty ($id_foto) || empty ($id_car)){
            header("Location: " . BASE_URL . "administrador");
            die;
        }

        //Reviso que la publicacion exista
        $carExists= $this->carsModel ->getcar($id_car);

        //funcion chequea que sea una valor valido
        $this->broughtSomething($carExists, 'La publicacion no existe');
        
        //chequeo los privilegios del usuario, si puede o no manipular la publicacion
        $this->userPrivileges($id_car);

        //Reviso que la foto exista
        $photoExists= $this->photoModel ->getPhoto($id_foto);

        //funcion chequea que sea una valor valido
        $this->broughtSomething($photoExists, 'La foto que desea eliminar no existe');

        //UNA VEZ QUE SE QUE EL USUARIO TIENE PERMISOS PARA MANIPULAR LA PUBLICACION TENGO QUE SABER Y LA FOTO A ELIMINAR ES DE LA PUBLICACION YA VERIFICADA.

        //traigo las fotos por el id de la publicacion verificado y comparo si es de la publicacion, para no eliminar otra foto
        $photosChecked=$this->photoModel ->getPhotosByCar($id_car);

        //variable que chequea que la foto sea del usuario que la quirere eliminar
        $Checked=false;

        //recorro las fotos y me fijo si el ID de la foto que quiero eliminar el el mismo que el de alguna de las fotos de la publicacion ya verificada.
        foreach($photosChecked as $photoChecked){

            if($photoChecked->id_foto ==$id_foto){
                $Checked= true;
            }   
        }
        
        //funcion chequea que sea una valor valido
        $this->broughtSomething($Checked, 'La foto que desea eliminar no es de una publicacion valida');

        //traigo las fotos del auto
        $photo=$this->photoModel ->deletePhoto($id_foto);

        //PREGUNTART SI ESTA BIEN ESTO  
        if($photo){
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

        //funcion chequea que sea una valor valido
        $this->broughtSomething($userChecked, 'La publicacion no es de su propiedad');
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
    //funcion que se encarga de dar un error si no un valor valido ingresado
    private function broughtSomething($value, $message){

        if (!$value){    
            $this->failView->show_fail($message);
            die;
        }
    }
}