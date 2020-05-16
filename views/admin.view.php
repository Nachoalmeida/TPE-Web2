<?php
require_once 'libs/Smarty.class.php';

class AdminView{
    public function show_ABMpanel_view($brands, $cars){
        $smarty = new Smarty();
        $smarty -> assign('base_url', BASE_URL);
        $smarty -> assign('marcas', $brands);
        $smarty -> assign('autos', $cars);
        $smarty -> assign('titulo', 'Panel de Administrador');
        $smarty -> display('show_ABMpanel_view.tpl');
    }
    public function show_form_view($brands,$year){
        $smarty = new Smarty();
        $smarty -> assign('base_url', BASE_URL);
        $smarty -> assign('marcas', $brands);
        $smarty -> assign('anios', $year);
        $smarty -> assign('cont', 0);
        $smarty -> assign('titulo', 'Subir publicacion');
        $smarty -> display('show_form_view.tpl');
    }
    public function show_form_edit($brands, $car, $id_car,$year){
        $smarty = new Smarty();
        $smarty -> assign('base_url', BASE_URL);
        $smarty -> assign('marcas', $brands);
        $smarty -> assign('anios', $year);
        $smarty -> assign('auto', $car);
        $smarty -> assign('cont', 0);
        $smarty -> assign('id_auto', $id_car);
        $smarty -> assign('titulo', 'Subir publicacion');
        $smarty -> display('show_form_edit.tpl');
    }
}