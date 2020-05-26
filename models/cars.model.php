<?php 

require_once 'system.model.php';

class CarsModel extends SystemModel{

    // Devuelve todos los autos.
    public function getAllCars() {

        //envia la consulta
        $sentencia = $this->getDb()->prepare("SELECT * FROM autos JOIN marcas ON (id_marca_fk=id_marca)"); // prepara la consulta
        $sentencia->execute(); // ejecuta
        $autos = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
        return $autos;
    }
    // Devuelve un objeto con el id determinado
    public function getCar($id_car){

        // envia la consulta
        $sentencia = $this->getDb()->prepare("SELECT * FROM autos JOIN marcas ON (id_marca_fk=id_marca) WHERE id_auto = ?"); // prepara la consulta
        $sentencia->execute([$id_car]); // ejecuta
        $car = $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta
        return $car;
    }
    // inserta a la db, una nueva publicacion
    public function insertCar($title, $model, $year, $kilometers, $price, $description, $photo, $brand_name){

        //envia la consulta
        $sentencia = $this->getDb()->prepare("INSERT INTO autos (titulo, modelo, anio, kilometros,precio,descripcion,foto,id_marca_fk) VALUES(?, ?, ?, ?, ?, ?, ?, ?)"); // prepara la consulta
        return $sentencia->execute([$title, $model, $year, $kilometers, $price, $description, $photo, $brand_name]); // ejecuta
    }
    // trae solo los autos con una marca especifica
    public function getCarsByBrand($brand){

        // envia la consulta
        $sentencia = $this->getDb()->prepare("SELECT * FROM autos JOIN marcas ON (id_marca_fk=id_marca) WHERE nombre_marca = ?"); // prepara la consulta
        $sentencia->execute([$brand]); // ejecuta
        $carsBrand = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
        return $carsBrand;
    }
    //Borra un auto
    public function deleteCar($id_car) {
        // enviamos la consulta
        $sentencia = $this->getDb()->prepare("DELETE FROM autos WHERE id_auto = ?"); // prepara la consulta
        return $sentencia->execute([$id_car]); // ejecuta    
    }
    //edita una publicacion
    public function editCar($id_car, $title, $model, $year, $kilometers, $price, $description, $photo, $brand_name){
       $sentencia = $this->getDb()->prepare("UPDATE autos SET titulo= ?, modelo= ?, anio= ?, kilometros= ?,precio= ?,descripcion= ?,foto= ?, id_marca_fk= ? WHERE id_auto = ?"); // prepara la consulta
       return $sentencia->execute([$title, $model, $year, $kilometers, $price, $description, $photo, $brand_name, $id_car]); // ejecuta    
    }
}