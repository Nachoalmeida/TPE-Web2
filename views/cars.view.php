<?php
require_once 'smartyInit.view.php';

class CarsView extends SmartyInit{

    public function show_cars($cars, $photos){
        $this->getSmarty()->assign('titulo', 'Comprate un Nissan');
        $this->getSmarty()->assign('autos', $cars);
        $this->getSmarty()->assign('fotos', $photos);
        $this->getSmarty()->assign('unaFoto', 0);
        $this->getSmarty()->display('home.tpl');

        
    }

    public function show_car($car, $photos){   
        $this->getSmarty()->assign('auto', $car);
        $this->getSmarty()->assign('fotos', $photos);
        $this->getSmarty()->assign('user_id', HelperSession::userID_view());
        $this->getSmarty()->assign('unaFoto', 0);
        $this->getSmarty()->assign('titulo', 'Ver Mas');
        $this->getSmarty()->display('show_car.tpl');
    }

    public function show_by_category($carsBrand, $brand,$photos){
        $this->getSmarty()->assign('titulo', $brand);
        $this->getSmarty()->assign('autos', $carsBrand);
        $this->getSmarty()->assign('fotos', $photos);
        $this->getSmarty()->assign('unaFoto', 0);
        $this->getSmarty()->display('brand.tpl');
    }
}