<?php

require_once 'smartyInit.view.php';

class CarsView extends SmartyInit{

    public function show_cars($cars){
        $this->getSmarty()-> assign('titulo', 'Autos');
        $this->getSmarty()-> assign('autos', $cars);
        $this->getSmarty()-> display('home.tpl');

        
    }

    public function show_car($car){   
        $this->getSmarty()-> assign('auto', $car);
        $this->getSmarty()-> assign('titulo', 'Ver Mas');
        $this->getSmarty()-> display('show_car.tpl');
    }

    public function show_by_category($carsBrand, $brand){
        $this->getSmarty()-> assign('titulo', $brand);
        $this->getSmarty()-> assign('autos', $carsBrand);
        $this->getSmarty()-> display('brand.tpl');
    }
}