<?php
require_once 'models/cars.model.php';
require_once 'models/brands.model.php';
require_once 'views/cars.view.php';
require_once 'views/fail.view.php';

class CarsController {

    private $carsModel;
    private $brandsModel;
    private $photoModel;
    private $carsview;
    private $failview;
   
    public function __construct() {
       $this->carsModel = new CarsModel();
       $this->brandsModel = new BrandsModel();
       $this->photoModel = new PhotoModel();
       $brands = $this->brandsModel->getAllBrands();
       $this->carsview  = new CarsView($brands);
       $this->failview = new FailView($brands);
    }

    public function showCars() {
        // pido los autos al MODELO
        $cars = $this->carsModel->getAllCars();
        $photos = $this->photoModel->getAllphotos();
        // actualizo la vista
        $this->carsview->show_cars($cars, $photos);

    }

    //FUNCION MOSTRAR UN AUTO
    public function showCar($id_car){
        // pido el auto al MODELO
        $car = $this->carsModel->getCar($id_car);
        //traigo las fotos del auto
        $photos=$this->photoModel ->getPhotosByCar($id_car);
        
        if (!empty($car)){
        // actualizo la vista
        $this->carsview->show_car($car, $photos);
        }
        else{$this->failview->show_fail('El Vehiculo no existe');}
    }

    public function showURLFail(){
        // actualizo la vista
        $this->failview->show_fail('La URL no existe');
    }

    public function showFormBuy(){
        // actualizo la vista
        $this->failview->show_fail('Felicitaciones!!! Ya es tuyo! Que maquinón!!');
    }

    public function showCarsByBrand($brand){
        // pido los autos al MODELO
        $carsBrand = $this->carsModel->getCarsByBrand($brand);
        $photos = $this->photoModel->getAllphotos();
        if (!empty ($carsBrand)){
        // actualizo la vista
        $this->carsview->show_by_category($carsBrand,$brand,$photos);
        }
        else{$this->failview->show_fail('No se ha encontrado ningún vehiculo con esa Marca :(', 'Marca');}
    }  
 
}