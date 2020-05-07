<?php

require_once 'views/admin.view.php';

class AdminController {
    private $model;
    private $view;

    public function __construct() {
       $this->model = new CarsModel();
       $this->view = new AdminView();
    }

    public function showForm() {
        // actualizo la vista
        $this->view->show_form_view();

    }


    function addCar() {
        // toma los valores enviados por el admin
        $titulo = $_POST['titulo'];
        $modelo = $_POST['modelo'];
        $anio = $_POST['anio'];
        $kilometros = $_POST['kilometros'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $foto = $_POST['foto'];
        $nombre_marca = $_POST['nombre_marca'];
    
        // verifica los datos obligatorios
        if (empty($titulo) || empty($modelo) || empty($precio) || empty($nombre_marca)) {
            $this->view->showError("Faltan datos obligatorios");
            die();
        }

        // inserta en la DB y redirige
        $success = $this->model->insert($titulo, $modelo, $anio, $kilometros, $precio, $descripcion, $foto, $nombre_marca);

        if($success)
            header('Location: ' . BASE_URL . "inicio");
        else
            $this->view->showError("Error al agregar el registro");

    }

}