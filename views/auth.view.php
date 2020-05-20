<?php
require_once 'libs/Smarty.class.php';

class AuthView{
    public function form_login($brands, $errorMessage = null){
        $smarty = new Smarty();
        $smarty -> assign('base_url', BASE_URL);
        $smarty -> assign('marcas', $brands);
        $smarty -> assign('mensaje', $errorMessage);
        $smarty -> assign('titulo', 'Ingresar');
        $smarty -> display('login_form.tpl');
    }
}