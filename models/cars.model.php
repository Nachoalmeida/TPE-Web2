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

    public function getCar($id_car)
    {
        // abro la conexión con MySQL 
        $db = SystemModel::getConection();
        // envia la consulta
        $sentencia = $db->prepare("SELECT * FROM autos JOIN marca ON (id_marca_fk=id_marca) WHERE id_auto = ?"); // prepara la consulta
        $sentencia->execute([$id_car]); // ejecuta
        $car = $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta

        return $car;
    }


    // inserta a la db

    public function insertCar($titulo, $modelo, $anio, $kilometros, $precio, $descripcion, $foto, $nombre_marca){
        // abro la conexión con MySQL  
         $db = SystemModel::getConection();
        //envia la consulta
        $sentencia = $db->prepare("INSERT INTO autos (titulo, modelo, anio, kilometros,precio,descripcion,foto,id_marca_fk) VALUES(?, ?, ?, ?, ?, ?, ?, ?)"); // prepara la consulta
        return $sentencia->execute([$titulo, $modelo, $anio, $kilometros, $precio, $descripcion, $foto,$nombre_marca]); // ejecuta
    }

    // trae las marcas

    public function getBrand($brand){
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


}