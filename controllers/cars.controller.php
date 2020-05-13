<?php
require_once 'models/cars.model.php';
require_once 'views/cars.view.php';
require_once 'views/fail.view.php';

class CarsController {

    private $carsModel;
    private $carsview;
    private $failview;

    public function __construct() {
       $this->carsModel = new CarsModel();
       $this->carsview = new CarsView();
       $this->failview = new FailView();
    }

    public function showCars() {
        // pido los autos al MODELO
        $cars = $this->carsModel->getAllCars();

        // actualizo la vista
        $this->carsview->show_cars($cars);

    }


    //FUNCION MOSTRAR UN AUTO
    public function viewCar($id_car){
        // pido el auto al MODELO
        $car = $this->carsModel->getCar($id_car);

        if (!empty($car)){
        // actualizo la vista
        $this->carsview->show_car($car);
        }
        else{$this->failview->show_fail('El Vehiculo no existe');}

    }

    public function showURLFail(){
        // actualizo la vista
        $this->failview->show_fail('La URL no existe');
    }

    public function showBrand($brand){
       // pido los autos al MODELO
       $carsBrand = $this->carsModel->getBrand($brand);
       if (!empty($brand)){
       // actualizo la vista
       $this->carsview->show_by_category($carsBrand,$brand);
       }
       else{$this->failview->show_fail('No se ha encontrado ningun vehiculo con esa Marca :(');}

    }

}