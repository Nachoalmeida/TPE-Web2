<?php
require_once 'libs/Smarty.class.php';

class AdminView{
    public function show_form_view(){
        $smarty = new Smarty();
        $smarty -> assign('base_url', BASE_URL);
        $smarty -> assign('titulo', 'Subir publicacion');
        $smarty -> display('show_form_view.tpl');
    }
}