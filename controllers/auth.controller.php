<?php

require_once 'views/auth.view.php';
require_once 'models/brands.model.php';
require_once 'models/users.model.php';

class AuthController {

    private $authView;
    private $brandsModel;
    private $usersModel;

    public function __construct() {  
       $this->brandsModel = new BrandsModel();
       $this->usersModel = new UsersModel();
       //traigo las marcas
       $brands=$this->brandsModel->getAllBrands();
       $this->authView = new AuthView($brands);
    }    
    public function showFormLogin(){
        //muestro el login
        $this->authView->form_login(); 
    }
    public function login(){
        $mail=$_POST['mail'];
        $pass=$_POST['password'];

        //traigo usuario
        $user=$this->usersModel->getUser($mail);

        if($user && password_verify($pass, $user->password)){
            session_start();
            $_SESSION['logged'] = true;
            $_SESSION['user'] = $user->user_name;
            header("Location: " . BASE_URL . "administrador");
        }
        else {
        //muestro el login
        $this->authView->form_login('Datos incorrectos, pruebe nuevamente');

        }

    }
}
