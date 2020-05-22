<?php
require_once 'models/cars.model.php';
require_once 'models/brands.model.php';
require_once 'views/cars.view.php';
require_once 'views/fail.view.php';



class CarsController {

    private $carsModel;
    private $brandsModel;
    private $carsview;
    private $failview;

    
    public function __construct() {
       $this->carsModel = new CarsModel();
       $this->brandsModel = new BrandsModel();
       $brands = $this->brandsModel->getAllBrands();
       $this->carsview  = new CarsView($brands);
       $this->failview = new FailView($brands);
    }

    public function showCars() {
        // pido los autos al MODELO
        $cars = $this->carsModel->getAllCars();
        // actualizo la vista
        $this->carsview->show_cars($cars);

    }


    //FUNCION MOSTRAR UN AUTO
    public function showCar($id_car){
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

    public function showCarsByBrand($brand){
        // pido los autos al MODELO
        $carsBrand = $this->carsModel->getCarsByBrand($brand);
        if (!empty($carsBrand)){
        // actualizo la vista
        $this->carsview->show_by_category($carsBrand,$brand);
        }
        else{$this->failview->show_fail('No se ha encontrado ningún vehiculo con esa Marca :(');}
    }  
 
}