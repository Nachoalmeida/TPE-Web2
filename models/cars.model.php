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

    /**
     * Devuelve todos los autos.
     */
    public function getAllCars() {
        // 1. abro la conexión con MySQL 
        $db = $this->createConection();

        // 2. enviamos la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT * FROM autos"); // prepara la consulta
        $sentencia->execute(); // ejecuta
        $autos = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

        return $autos;
    }


}