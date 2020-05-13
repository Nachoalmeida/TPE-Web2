<?php
require_once 'models/cars.model.php';
require_once 'views/cars.view.php';
require_once 'views/fail.view.php';

class CarsController {

    private $model;
    private $view;
    private $failview;

    public function __construct() {
       $this->model = new CarsModel();
       $this->view = new CarsView();
       $this->failview = new FailView();
    }

    public function showCars() {
        // pido los autos al MODELO
        $autos = $this->model->getAllCars();

        // actualizo la vista
        $this->view->show_cars($autos);

    }


    //FUNCION MOSTRAR UN AUTO
    public function viewCar($id_car){
        // pido el auto al MODELO
        $car = $this->model->getCar($id_car);

        if (!empty($car)){
        // actualizo la vista
        $this->view->show_car($car);
        }
        else{$this->view->show_fail();}

    }

    public function showURLFail(){
        // actualizo la vista
        $this->failview->show_fail('La URL no existe');
    }

    public function showBrand($brand){
       // pido el auto al MODELO
       $carsBrand = $this->model->getBrand($brand);
       if (!empty($brand)){
       // actualizo la vista
       $this->view->show_by_category($carsBrand,$brand);
       }
       else{$this->failview->show_fail('No se ha encontrado ningun vehiculo con esa Marca :(');}

    }

}