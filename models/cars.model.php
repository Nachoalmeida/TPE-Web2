<?php 

class CarsModel{

    private function createConection() {
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'db_autos';

        try {
        $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName, $password);
        } catch (Exception $e) {
            var_dump($e);
        }
        return $pdo;
    }


    // Devuelve todos los autos.
    public function getAllCars() {
        // abre la conexión con MySQL 
        $db = $this->createConection();

        //envia la consulta
        $sentencia = $db->prepare("SELECT * FROM autos JOIN marca ON (id_marca_fk=id_marca)"); // prepara la consulta
        $sentencia->execute(); // ejecuta
        $autos = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
        return $autos;
    }


    // Devuelve una objeto con el id determinado

    public function getCar($id_car)
    {
        // abro la conexión con MySQL 
        $db = $this->createConection();

        // envia la consulta
        $sentencia = $db->prepare("SELECT * FROM  WHERE id_auto = ?"); // prepara la consulta
        $sentencia->execute([$id_car]); // ejecuta
        $car = $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta

        return $car;
    }

    public function insertCar($titulo, $modelo, $anio, $kilometros, $precio, $descripcion, $foto, $nombre_marca){
        // abro la conexión con MySQL  
         $db = $this->createConection();

        //envia la consulta
        $sentencia = $db->prepare("INSERT INTO autos (titulo, modelo, anio, kilometros,precio,descripcion,foto,id_marca_fk) VALUES(?, ?, ?, ?, ?, ?, ?, ?)"); // prepara la consulta
        return $sentencia->execute([$titulo, $modelo, $anio, $kilometros, $precio, $descripcion, $foto,$nombre_marca]); // ejecuta
    }


}