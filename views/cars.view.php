<?php
require_once 'libs/Smarty.class.php';
class CarsView{

    public function show_cars($cars, $brands){
        //foreach ($autos as $auto) {

        $smarty = new Smarty();
        $smarty -> assign('base_url', BASE_URL);
        $smarty -> assign('titulo', 'Autos');
        $smarty -> assign('autos', $cars);
        $smarty -> assign('marcas', $brands);
        $smarty -> display('show_cars.tpl');

        
    }

    public function show_car($car, $brands){
        $smarty = new Smarty();
        $smarty -> assign('auto', $car);
        $smarty -> assign('marcas', $brands);
        $smarty -> assign('base_url', BASE_URL);
        $smarty -> assign('titulo', 'Ver Mas');
        $smarty -> display('show_car.tpl');
    }

    public function show_fail($brands){

        $smarty = new Smarty();
        $smarty -> assign('marcas', $brands);
        $smarty -> assign('error', 'hay un error');
        $smarty -> assign('base_url', BASE_URL);
        $smarty -> assign('titulo', 'Fallo!!!');
        $smarty -> display('header.tpl');
    }

    public function show_by_category($carsBrand, $brand,$brands){
        $smarty = new Smarty();
        $smarty -> assign('marcas', $brands);
        $smarty -> assign('base_url', BASE_URL);
        $smarty -> assign('titulo', $brand);
        $smarty -> assign('autos', $carsBrand);
        $smarty -> display('show_cars.tpl');
    }
}