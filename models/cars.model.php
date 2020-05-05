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


}