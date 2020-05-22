<?php

require_once 'smartyInit.view.php';

class FailView extends SmartyInit{
    public function show_fail($mensaje){
        $this-> getSmarty()-> assign('error', $mensaje);
        $this-> getSmarty()-> assign('titulo', 'Error Fatal!');
        $this-> getSmarty()-> display('show_fail.tpl');
    }
}