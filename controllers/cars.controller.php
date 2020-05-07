<?php
require_once 'models/cars.model.php';
require_once 'views/cars.view.php';

class CarsController {

    private $model;
    private $view;

    public function __construct() {
       $this->model = new CarsModel();
       $this->view = new CarsView();
    }

    public function showCars() {
        // pido los autos al MODELO
        $autos = $this->model->getAllCars();

        // actualizo la vista
        $this->view->show_cars($autos);

    }


    //FUNCION MOSTRAR UN AUTO
    public function viewCar($Car){
        // pido el auto al MODELO
        $auto = $this->model->getCar($Car);

        // actualizo la vista
        $this->view->show_car($auto);

    }

}