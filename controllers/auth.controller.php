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
        
        if (empty ($mail) || empty ($pass)){
            $this->authView->form_login('Datos incorrectos, pruebe nuevamente');
            die;
        }
        //traigo usuario
        $user=$this->usersModel->getUserMail($mail);

        if($user && password_verify($pass, $user->password)){
            $this->sessionUser($user);
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

    public function SignUp(){
        // toma los valores enviados por el formulario
        $user_name = $_POST['user_name'];
        $pass = $_POST['password'];
        $passTwo = $_POST['password_two'];
        $mail = $_POST['mail'];

        // Nombre archivo original
        $originalName = $_FILES['input_name']['name'];
        // Nombre en el file system:
        $physicalName = $_FILES['input_name']['tmp_name'];

        //pregunto si los campos obligatorios existen
        if (empty ($user_name) || empty ($pass) || empty ($passTwo) || empty ($mail) || !$originalName){
            header("Location: " . BASE_URL . "registrarse");
            die;
        }

        //Chequeo si, el usuario o el mail existen 
        $userCheck=$this->usersModel->getUserName($user_name);
        $mailCheck=$this->usersModel->getUserMail($mail);
        //Chequeo los pass son iguales, sin son iguales devuelven false, si son distitos devuelve true.
        $passCheck=$pass != $passTwo;

        //Si el nombre de usuario o el mail existen entran al IF, o si las contraseñas no son iguales.
        if ($userCheck || $mailCheck || $passCheck ){
            //le mandamos los valores para actualizar la vista, al ser booleanos la vita sabe cual mostrar y cual no.
            $this->authView->form_sign_up($userCheck, $mailCheck, $passCheck);
            die;
        }
        
        //encrypto la contraseña del nuevo usuario 
        $encrypted_pass = password_hash ($pass , PASSWORD_DEFAULT );
        
        //pregunto si subio una imagen
        if (($_FILES['input_name']['type'] == "image/jpg" || 
        $_FILES['input_name']['type'] == "image/jpeg" || 
        $_FILES['input_name']['type'] == "image/png")) {
            $success = $this->usersModel->insertImage($user_name, $encrypted_pass, $mail, $originalName, $physicalName);
        } else {
            $success = $this->usersModel->insert($user_name, $encrypted_pass, $mail, "images/user_foto/user.png");
        }

        if($success)
            $this->sessionUser($success);
        else
            $this->failView->show_fail('Error al agregar el registro');
    }

    private function sessionUser($user){
        session_start();
            $_SESSION['logged'] = true;
            $_SESSION['admin'] = $user->administrador;
            $_SESSION['user'] = $user->user_name;
            $_SESSION['user_id'] = $user->id_usuario;
            $_SESSION['photo'] = $user->foto_perfil;
            header("Location: " . BASE_URL . "administrador");
    }
 //FIN NUEVO******************************************************************************************************
}
