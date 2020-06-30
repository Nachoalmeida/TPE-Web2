<?php
require_once 'smartyInit.view.php';

class AuthView extends SmartyInit{
    public function form_login($errorMessage = false){
        $this->getSmarty()->assign('mensaje', $errorMessage);
        $this->getSmarty()->assign('titulo', 'Ingresar');
        $this->getSmarty()->display('login_form.tpl');
    }
    public function form_sign_up($errorUser = false,$errorMail=false, $errorPass=false){
        $this->getSmarty()->assign('mensaje_usuario', $errorUser);
        $this->getSmarty()->assign('mensaje_mail', $errorMail);
        $this->getSmarty()->assign('pass_error', $errorPass);
        $this->getSmarty()->assign('titulo', 'Crear usuario');
        $this->getSmarty()->display('sign_up_form.tpl');
    }
}