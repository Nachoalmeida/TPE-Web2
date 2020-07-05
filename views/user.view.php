<?php
require_once 'smartyInit.view.php';


class UserView extends SmartyInit{
    
    public function show_ABMpanel_view( $cars,$user,$photo){     
        $this->getSmarty()->assign('autos', $cars);
        $this->getSmarty()->assign('usuario', $user);
        $this->getSmarty()->assign('foto', $photo);
        $this->getSmarty()->assign('titulo', 'Panel de Administrador');
        $this->getSmarty()->display('show_ABMpanel_view.tpl');
    }
    
    public function show_form_view($year, $titulo,$car=false,$photos=false){
        $this->getSmarty()->assign('anios', $year);
        $this->getSmarty()->assign('cont', 0);
        $this->getSmarty()->assign('auto', $car);
        $this->getSmarty()->assign('titulo', $titulo);
        $this->getSmarty()->assign('fotos', $photos);
        $this->getSmarty()->display('show_form_view.tpl');
    }
    
    public function form_brand($titulo, $brand=false){
        $this->getSmarty()->assign('titulo', $titulo);
        $this->getSmarty()->assign('marca', $brand);
        $this->getSmarty()->display('form_brand.tpl');
    }
    
}