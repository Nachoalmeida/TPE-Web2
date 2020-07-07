<?php

require_once 'smartyInit.view.php';

class FailView extends SmartyInit
{
    public function show_fail($mensaje, $titulo = 'Error Fatal!')
    {
        $this->getSmarty()->assign('error', $mensaje);
        $this->getSmarty()->assign('titulo', $titulo);
        $this->getSmarty()->display('show_fail.tpl');
    }
}
