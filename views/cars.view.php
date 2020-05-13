<?php
require_once 'libs/Smarty.class.php';
class CarsView{

    public function show_cars($autos){
        //foreach ($autos as $auto) {

        $smarty = new Smarty();
        $smarty -> assign('base_url', BASE_URL);
        $smarty -> assign('titulo', 'Autos');
        $smarty -> assign('autos', $autos);
        $smarty -> display('show_cars.tpl');

        
    }

    public function show_car($auto){
        $smarty = new Smarty();
        $smarty -> assign('auto', $auto);
        $smarty -> assign('base_url', BASE_URL);
        $smarty -> assign('titulo', 'Ver Mas');
        $smarty -> display('show_car.tpl');
    }

    public function show_fail(){

        $smarty = new Smarty();
        $smarty -> assign('error', 'hay un error');
        $smarty -> assign('base_url', BASE_URL);
        $smarty -> assign('titulo', 'Fallo!!!');
        $smarty -> display('header.tpl');
    }

    public function show_by_category($carsBrand, $brand){
        $smarty = new Smarty();
        $smarty -> assign('base_url', BASE_URL);
        $smarty -> assign('titulo', $brand);
        $smarty -> assign('autos', $carsBrand);
        $smarty -> display('show_cars.tpl');
    }
}