<?php
require_once 'smartyInit.view.php';


class AdminView extends SmartyInit{
    
    public function show_ABMpanel_view( $cars,$user){     
        $this->getSmarty()-> assign('autos', $cars);
        $this->getSmarty() -> assign('usuario', $user);
        $this->getSmarty() -> assign('titulo', 'Panel de Administrador');
        $this->getSmarty() -> display('show_ABMpanel_view.tpl');
    }
    public function show_form_view($year){
        $this->getSmarty() -> assign('anios', $year);
        $this->getSmarty() -> assign('cont', 0);
        $this->getSmarty() -> assign('titulo', 'Subir publicacion');
        $this->getSmarty() -> display('show_form_view.tpl');
    }
    public function show_form_edit( $car, $id_car,$year){
        $this->getSmarty() -> assign('anios', $year);
        $this->getSmarty() -> assign('auto', $car);
        $this->getSmarty() -> assign('cont', 0);
        $this->getSmarty() -> assign('id_auto', $id_car);
        $this->getSmarty() -> assign('titulo', 'Editar publicacion');
        $this->getSmarty() -> display('show_form_edit.tpl');
    }
    public function form_add_brand(){
        $this->getSmarty() -> assign('titulo', 'Agregar marca');
        $this->getSmarty() -> display('form_add_brand.tpl');
    }

    public function form_edit_brand($brand){
        $this->getSmarty() ->assign('marca', $brand);
        $this->getSmarty() -> assign('titulo', 'Editar marca');
        $this->getSmarty() -> display('form_edit_brand.tpl');
    }

}