<?php
require_once 'smartyInit.view.php';

class AuthView extends SmartyInit{
    public function form_login($errorMessage = null){
        $this->getSmarty()-> assign('mensaje', $errorMessage);
        $this->getSmarty()-> assign('titulo', 'Ingresar');
        $this->getSmarty()-> display('login_form.tpl');
    }
}