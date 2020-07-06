<?php
require_once 'models/brands.model.php';
require_once 'models/cars.model.php';
require_once 'models/users.model.php';
require_once 'views/user.view.php';
require_once 'views/fail.view.php';
require_once 'helper/session.helper.php';

class AdminController {
    private $brandsModel;
    private $carsModel;
    private $userModel;
    private $userView;
    private $failView;
    private $user_id;

    public function __construct() {
       HelperSession::accessAdmin();
       $this->brandsModel = new BrandsModel();
       $this->carsModel = new CarsModel();
       $this->userModel = new UsersModel();
       $this->user_id = $_SESSION['user_id'];
       //pido las marcas al modelo
       $brands = $this->brandsModel->getAllBrands();
       $this->userView  = new UserView($brands);
       $this->failView = new FailView($brands);
    }     
    
    public function showFormAddBrand(){  
        //titulo
        $titulo='Crear Marca';
        // actualizo la vista
        $this->userView->form_brand($titulo);
    }

    public function addBrand(){
       
        $brand_name = $_POST['nombre_marca'];
        if (empty ($brand_name)){
            header('Location: ' . BASE_URL . 'administrador');
            die;
        }

        $brandCheckedName= $this->brandsModel->getBrandName($brand_name);

        if($brandCheckedName->nombre_marca != $brand_name){
            // agrego la nueva marca
            $addBrands=$this->brandsModel->insertBrand($brand_name);
        }
        else{
            $this->failView->show_fail('La marca que intenta crear, ya fue creada');
            die;
        }
        
        if($addBrands)
            header('Location: ' . BASE_URL . 'administrador');
        else
            $this->failView->show_fail('No se pudo agregar! Revise su conexión');
    }

    public function showFormEditBrand($id_brand){
        
        //titulo
        $titulo='Editar Marca';
        // traigo la marca
        $brand=$this->brandsModel -> getBrand($id_brand);
        // actualizo la vista
        $this->userView->form_brand($titulo, $brand);
    }

    public function editBrand(){
        
        // toma los valores enviados por el formulario
        $brand_name = $_POST['nombre_marca'];
        // traigo el id de la marca, del value del boton, con el name id_marca
        $id_brand=$_POST['id_marca'];
        if (empty ($brand_name) || empty ($id_brand)){
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
        if (empty ($id_brand)){
            header('Location: ' . BASE_URL . 'administrador');
            die;
        }
        //consulta si hay publicaciones con esa marca
        $carsBrandId = $this->carsModel->getCarsByBrandId($id_brand);

        $detelebrand=0;

        if(!$carsBrandId){
            // elimino la marca
            $detelebrand=$this->brandsModel -> deleteBrand($id_brand);
        }
        // actualizo la vista
        if($detelebrand)
            header('Location: ' . BASE_URL . 'administrador');
        else
            $this->failView->show_fail('No se puede eliminar una marca con publicaciones activas!');
    } 

    public function deleteUser(){
        $id_user=$_POST['id_usuario_eliminar'];

        if (empty ($id_user)){
            header('Location: ' . BASE_URL . 'administrador');
            die;
        }

        $deleteUser=null;

        $existsUser = $this->userModel -> getUser($id_user);

        if($existsUser && $this->user_id != $id_user){
            // elimino el usuario
            $deleteUser=$this->userModel -> deleteUser($id_user);
        }
        
        // actualizo la vista
        if($deleteUser)
        header('Location: ' . BASE_URL . 'administrador');
        else
        $this->failView->show_fail('No se pudo eliminar el usuario');
    } 

    public function modifyRole(){

        $id_user=$_POST['id_usuario_permiso'];

        if (empty ($id_user)){
            header('Location: ' . BASE_URL . 'administrador');
            die;
        }
        $modifyRole=null;
        
        $existsUser = $this->userModel -> getUser($id_user);

        if($existsUser && $this->user_id != $id_user){
            $role= !$existsUser->administrador;

            // cambio el rol
            $modifyRole=$this->userModel -> modifyRole($id_user,$role);
        }

        // actualizo la vista
        if($modifyRole)
        header('Location: ' . BASE_URL . 'administrador');
        else
        $this->failView->show_fail('No se pudo modificar el rol del usuario');

    }

}