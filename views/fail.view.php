<?php
require_once 'libs/Smarty.class.php';

class FailView{

    public function show_fail($mensaje,$brands){

        $smarty = new Smarty();
        $smarty -> assign('error', $mensaje);
        $smarty -> assign('marcas', $brands);
        $smarty -> assign('base_url', BASE_URL);
        $smarty -> assign('titulo', 'Error Fatal!');
        $smarty -> display('show_fail.tpl');
    }
}