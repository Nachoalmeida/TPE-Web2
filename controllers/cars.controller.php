<?php
require_once 'models/cars.model.php';
require_once 'views/cars.view.php';

class CarsController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new TaskModel();
        $this->view = new TaskView();
    }

    public function showCars() {
    }


}