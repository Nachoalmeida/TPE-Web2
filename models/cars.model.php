<?php 

require_once('system.model.php');

class CarsModel{

    // Devuelve todos los autos.
    public function getAllCars() {
        // abre la conexión con MySQL 
        $db = SystemModel::getConection();
        //envia la consulta
        $sentencia = $db->prepare("SELECT * FROM autos JOIN marca ON (id_marca_fk=id_marca)"); // prepara la consulta
        $sentencia->execute(); // ejecuta
        $autos = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
        return $autos;
    }
    // Devuelve un objeto con el id determinado
    public function getCar($id_car){
        // abro la conexión con MySQL 
        $db = SystemModel::getConection();
        // envia la consulta
        $sentencia = $db->prepare("SELECT * FROM autos JOIN marca ON (id_marca_fk=id_marca) WHERE id_auto = ?"); // prepara la consulta
        $sentencia->execute([$id_car]); // ejecuta
        $car = $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta
        return $car;
    }
    // inserta a la db, una nueva publicacion
    public function insertCar($title, $model, $year, $kilometres, $price, $description, $photo, $brand_name){
        // abro la conexión con MySQL  
         $db = SystemModel::getConection();
        //envia la consulta
        $sentencia = $db->prepare("INSERT INTO autos (titulo, modelo, anio, kilometros,precio,descripcion,foto,id_marca_fk) VALUES(?, ?, ?, ?, ?, ?, ?, ?)"); // prepara la consulta
        return $sentencia->execute([$title, $model, $year, $kilometres, $price, $description, $photo, $brand_name]); // ejecuta
    }
    // trae solo los autos con una marca especifica
    public function getCarsByBrand($brand){
        // abro la conexión con MySQL 
        $db = SystemModel::getConection();
        // envia la consulta
        $sentencia = $db->prepare("SELECT * FROM autos JOIN marca ON (id_marca_fk=id_marca) WHERE nombre_marca = ?"); // prepara la consulta
        $sentencia->execute([$brand]); // ejecuta
        $carsBrand = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

        return $carsBrand;
    }
    //Borra un auto
    public function deleteCar($id_car) {
        // abro la conexión con MySQL 
        $db = SystemModel::getConection();
        // enviamos la consulta
        $sentencia = $db->prepare("DELETE FROM autos WHERE id_auto = ?"); // prepara la consulta
        $sentencia->execute([$id_car]); // ejecuta    
    }
    //edita una publicacion
    public function editCar($id_car,$title, $model, $year, $kilometres, $price, $description, $photo, $brand_name){
        // 1. abro la conexión con MySQL 
        $db = SystemModel::getConection(); 
        // 2. enviamos la consulta //importante si es un string la variable va entre ''
       $sentencia = $db->prepare("UPDATE autos SET titulo='$title', modelo='$model', anio=$year, kilometros=$kilometres,precio=$price,descripcion='$description',foto='$photo', id_marca_fk=$brand_name WHERE id_auto = ?"); // prepara la consulta
       return $sentencia->execute([$id_car]); // ejecuta    
    }
}