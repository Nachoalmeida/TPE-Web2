<?php
require_once 'models/cars.model.php';
require_once 'models/brands.model.php';
require_once 'models/photo.model.php';
require_once 'models/users.model.php';
require_once 'views/user.view.php';
require_once 'views/fail.view.php';
require_once 'helper/session.helper.php';


class UserController{

    private $carsModel;
    private $brandsModel;
    private $photoModel;
    private $usersModel;

    private $userView;
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
       $this->usersModel = new UsersModel();
       //pido las marcas al modelo
       $brands = $this->brandsModel->getAllBrands();
       $this->userView  = new UserView($brands);
       $this->failView = new FailView($brands);
       $this->user_id = $_SESSION['user_id'];
       $this->userChecked = $_SESSION['admin'];
       $this->userName = $_SESSION['user'];
       $this->userPhoto = $_SESSION['photo'];
    }    

    public function showABMPanel(){
        // traigo los datos
        $userChecked=$this->userChecked;
        $user_id=$this->user_id; 
        $userName=$this->userName;
        $photo=$this->userPhoto; 

        //si es user puede ver todo, sino solo ve sus publicaciones
        if ($userChecked){
        $cars=$this->carsModel -> getAllCars();
        $users= $this->usersModel ->getAllUsers();
        }
        else{ 
            $cars=$this->carsModel -> getCarsByUser($user_id);
            $users=null;
        }
        
        // actualizo la vista
        $this->userView->show_ABMpanel_view( $cars,$userName,$photo,$users,$user_id);
    }

    public function ShowAddCarForm() {
        // tomo el año actual
        $year=date("Y");
        // actualizo la vista
        $this->userView->show_form_view($year, 'Alta de Publicación');
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

        //verifica que vengan datos
        $no_image = 1;

        if($_FILES["imagesToUpload"]["error"][0] > 0){
            $no_image=0;
        }

        //verifico que ningun dato venga vacio
        $this->checkValues('Faltan Datos!!',$title,$no_image,$model,$year,$price,$description,$brand_name);
        
        //traigo el ID del usuario, para saber de quien es la publicacion.
        $user= $this->user_id;

        // inserta en la DB y redirige
        $success = $this->carsModel->insertCar($title, $model, $year, $kilometers, $price, $description,$brand_name,$user);

        $success_img =$this->addPhotos($success);

        //finaliza
        $this->endResult('Error al agregar el registro','administrador',$success,$success_img);
    }

    public function deleteCar(){
        // traigo el id de del auto, del value del boton, con en name id_auto_eliminar
        $id_car=$_POST['id_auto_eliminar'];

        //verifico que ningun dato venga vacio
        $this->checkValues('Faltan Datos!!',$id_car);

        //Reviso que la publicacion exista
        $carExists= $this->carsModel ->getcar($id_car);

        //funcion chequea que sea una valor valido
        $this->broughtSomething($carExists, 'La publicacion no existe');

        //verifico los permisos del ususario
        $this->userPrivileges($id_car);

        // elimino el auto
        $detelecar=$this->carsModel -> deleteCar($id_car);
        // actualizo la vista
        $this->endResult('No se pudo eliminar! Revise su conexión','administrador',$detelecar);
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

        //verifico que ningun dato venga vacio
        $this->checkValues('Faltan Datos!!',$title,$model,$year,$price,$description,$brand_name,$id_car);

        $this->userPrivileges($id_car);

        //edito del auto
        $editcar=$this->carsModel -> editCar($id_car,$title, $model, $year, $kilometers, $price, $description, $brand_name);

        //verifica que vengan datos
        $photos = 1;
        $insert=1;
        if($_FILES["imagesToUpload"]["error"][0] > 0){
            $insert=0;
        }
        //PREGUNTAR SI ESTA BIEN, ASI
        if($insert && $id_car){
            $photos =$this->addPhotos($id_car);
        }
        
        // actualizo la vista
        $this->endResult('No se pudo editar! Revise su conexión','editar_publicacion/'.$id_car,$editcar,$photos);
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
        $this->userView->show_form_view($year,$titulo, $car,$photos);
    }

    //ELIMINAR UNA FOTO DE LAS PUBLICACIONES
    public function deletePhoto($id_car,$id_foto){

        //verifico que ningun dato venga vacio
        $this->checkValues('Faltan Datos!!',$id_foto,$id_car);

        //Reviso que la publicacion exista
        $carExists= $this->carsModel ->getcar($id_car);
        $this->broughtSomething($carExists, 'La publicacion no existe');
        
        //chequeo los privilegios del usuario, si puede o no manipular la publicacion
        $this->userPrivileges($id_car);

        //Reviso que la foto exista
        $photoExists= $this->photoModel ->getPhoto($id_foto);
        $this->broughtSomething($photoExists, 'La foto que desea eliminar no existe');

        //UNA VEZ QUE SE QUE EL USUARIO TIENE PERMISOS PARA MANIPULAR LA PUBLICACION TENGO QUE SABER Y LA FOTO A ELIMINAR ES DE LA PUBLICACION YA VERIFICADA.
        //traigo las fotos por el id de la publicacion verificado y comparo si es de la publicacion, para no eliminar otra foto
        $photosChecked=$this->photoModel ->getPhotosByCar($id_car);
        $Checked=false;
        //recorro las fotos y me fijo si el ID de la foto que quiere eliminar es el mismo que el de alguna de las fotos de la publicacion ya verificada.
        foreach($photosChecked as $photoChecked){

            if($photoChecked->id_foto ==$id_foto){
                $Checked= true;
            }   
        }    
        $this->broughtSomething($Checked, 'La foto que desea eliminar no es de una publicacion valida');

        //elimino la foto
        $photo=$this->photoModel ->deletePhoto($id_foto);
     
        //repuesta final
        $this->endResult('No se pudo eliminar la foto! Revise su conexión','editar_publicacion/'.$id_car,$photo);
    }

    //FUNCION QUE NO PERMITE A LOS USUARIOS manipular publicaciones de otros usuarios
    private function userPrivileges($car_id){

        $user_id = $this->user_id;
        $userChecked = $this->userChecked;

        $cars=$this->carsModel ->getCarsByUser($user_id);
        
        if (!$userChecked && $cars){     
            foreach ($cars as $car){  
                if($car_id == $car->id_auto){
                    $userChecked = 1;
                }
            }
        }
        $this->broughtSomething($userChecked, 'La publicacion no es de su propiedad');
    }

    private function addPhotos($success){
        //si algo sale mal tira false, sino cambia a true
        $success_img=false;
        //recorremos el arreglo
        foreach($_FILES["imagesToUpload"]["tmp_name"] as $key => $tmp_name){
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

    private function endResult($message,$destination,$value,$value2=true){
        if($value && $value2)
            header('Location: ' . BASE_URL . $destination);
        else
            $this->failView->show_fail($message);
    }

    private function checkValues($message,$Value,$Value1=1,$Value2=1,$Value3=1,$Value4=1,$Value5=1,$Value6=1){
        if (empty ($Value) || empty ($Value1) || empty ($Value2) || empty ($Value3) || empty ($Value4) || empty ($Value5) || empty ($Value6)){
            $this->failView->show_fail($message);
            die;
        }
    }

}