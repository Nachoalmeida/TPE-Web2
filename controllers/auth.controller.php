<?php

require_once 'views/auth.view.php';
require_once 'views/fail.view.php';
require_once 'models/brands.model.php';
require_once 'models/users.model.php';

class AuthController {

    private $authView;
    private $failView;
    private $brandsModel;
    private $usersModel;

    public function __construct() {  
       $this->brandsModel = new BrandsModel();
       $this->usersModel = new UsersModel();
       //traigo las marcas
       $brands=$this->brandsModel->getAllBrands();
       $this->authView = new AuthView($brands);
       $this->failView = new FailView($brands);
    }  

    public function showFormLogin(){
        //muestro el login
        $this->authView->form_login(); 
    }

    public function login(){
        $mail=$_POST['mail'];
        $pass=$_POST['password'];
        if (!isset ($mail) && !isset ($pass)){
            header("Location: " . BASE_URL . "ingresar");
            die;
        }
        //traigo usuario
        $user=$this->usersModel->getUserMail($mail);

        if($user && password_verify($pass, $user->password)){
            session_start();
            $_SESSION['logged'] = true;
            $_SESSION['admin'] = $user->administrador;
            $_SESSION['user'] = $user->user_name;
            header("Location: " . BASE_URL . "administrador");
        }
        else {
        //muestro el login
        $this->authView->form_login('Datos incorrectos, pruebe nuevamente');
        }

    }

    public function logout(){
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . "ingresar");
    }
 //NUEVO******************************************************************************************************
    public function showFormSingUp(){
        //muestro el SignUp
        $this->authView->form_sign_up(); 
    }

    public function SingUp(){
        // toma los valores enviados por el formulario
        $user_name = $_POST['user_name'];
        $pass = $_POST['password'];
        $mail = $_POST['mail'];
        //preguntar por todas, nunca van solo a nivel front-end
        if (empty ($user_name) || empty ($pass) || empty ($mail)){
            header("Location: " . BASE_URL . "registrarse");
            die;
        }
        $user=$this->usersModel->getUserName($user_name);
        $mailCheck=$this->usersModel->getUserMail($mail);
        //REVISAR IF 
        if ($user || $mailCheck){
            if ($user && !$mailCheck){
                $this->authView->form_sign_up('El usuario ya existe');
                die;
            }
            else if($mailCheck && !$user){
                $this->authView->form_sign_up(null, 'El mail ya existe');
                die;
            }
            else{
                $this->authView->form_sign_up('El usuario ya existe','El mail ya existe');
                die;
            }
        }
        
        $encrypted_pass = password_hash ($pass , PASSWORD_DEFAULT );
        
        if (($_FILES['input_name']['type'] == "image/jpg" || 
        $_FILES['input_name']['type'] == "image/jpeg" || 
        $_FILES['input_name']['type'] == "image/png")) {
            $success = $this->usersModel->insertImage($user_name, $encrypted_pass, $mail);
        } else {
            $success = $this->usersModel->insert($user_name, $encrypted_pass, $mail, "images/user_foto/user");
        }

        if($success)
            header('Location: ' . BASE_URL . "administrador");
        else
            $this->failView->show_fail('Error al agregar el registro');
    }
//NUEVO******************************************************************************************************
}
