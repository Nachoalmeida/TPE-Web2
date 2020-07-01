<?php
require_once 'models/brands.model.php';
require_once 'views/admin.view.php';
require_once 'views/fail.view.php';
require_once 'helper/session.helper.php';

class AdminController {
    private $brandsModel;
    private $adminView;
    private $failView;

    public function __construct() {
       HelperSession::accessAdmin();
       $this->brandsModel = new BrandsModel();
       //pido las marcas al modelo
       $brands = $this->brandsModel->getAllBrands();
       $this->adminView  = new AdminView($brands);
       $this->failView = new FailView($brands);
    }     
    
    public function showFormAddBrand(){  
        //titulo
        $titulo='Crear Marca';
        // actualizo la vista
        $this->adminView->form_brand($titulo);
    }

    public function addBrand(){
       
        $brand_name = $_POST['nombre_marca'];
        if (empty ($brand_name)){
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
        
        //titulo
        $titulo='Editar Marca';
        // traigo la marca
        $brand=$this->brandsModel -> getBrand($id_brand);
        // actualizo la vista
        $this->adminView->form_brand($titulo, $brand);
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
            header("Location: " . BASE_URL . "administrador");
            die;
        }
        
        // elimino la marca
        $detelebrand=$this->brandsModel -> deleteBrand($id_brand);
        // actualizo la vista
        if($detelebrand)
            header('Location: ' . BASE_URL . 'administrador');
        else
            $this->failView->show_fail('No se puede eliminar una marca con publicaciones activas!');
    } 
}