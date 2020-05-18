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
       $this->carsview = new CarsView();
       $this->failview = new FailView();
    }

    public function showCars() {
        // pido los autos al MODELO
        $cars = $this->carsModel->getAllCars();
        $brands = $this->brandsModel->getAllBrands();

        // actualizo la vista
        $this->carsview->show_cars($cars,$brands);

    }


    //FUNCION MOSTRAR UN AUTO
    public function showCar($id_car){
        // pido el auto al MODELO
        $car = $this->carsModel->getCar($id_car);
        // pido las marcas al MODELO
        $brands = $this->brandsModel->getAllBrands();

        if (!empty($car)){
        // actualizo la vista
        $this->carsview->show_car($car,$brands);
        }
        else{$this->failview->show_fail('El Vehiculo no existe',$brands);}

    }

    public function showURLFail(){
         // pido las marcas al MODELO
         $brands = $this->brandsModel->getAllBrands();

        // actualizo la vista
        $this->failview->show_fail('La URL no existe',$brands);
    }

    public function showCarsByBrand($brand){
        // pido los autos al MODELO
        $carsBrand = $this->carsModel->getCarsByBrand($brand);
 
         // pido las marcas al MODELO
         $brands = $this->brandsModel->getAllBrands();
 
        if (!empty($carsBrand)){
        // actualizo la vista
        $this->carsview->show_by_category($carsBrand,$brand,$brands);
        }
        else{$this->failview->show_fail('No se ha encontrado ningún vehiculo con esa Marca :(',$brands);}
    }  
 
}