<?php
require_once 'smartyInit.view.php';

class AuthView extends SmartyInit{
    public function form_login($errorMessage = false){
        $this->getSmarty()->assign('mensaje', $errorMessage);
        $this->getSmarty()->assign('titulo', 'Ingresar');
        $this->getSmarty()->display('login_form.tpl');
    }
    public function form_sign_up($errorMessage = false){
        $this->getSmarty()->assign('mensaje', $errorMessage);
        $this->getSmarty()->assign('titulo', 'Crear usuario');
        $this->getSmarty()->display('sign_up_form.tpl');
    }
}