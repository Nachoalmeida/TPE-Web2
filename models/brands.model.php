<?php

class BrandsModel{

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

    // Devuelve todas las marcas.
    public function getAllBrands() {
        // abre la conexión con MySQL 
        $db = $this->createConection();

        $sentencia = $db->prepare("SELECT * FROM marca"); // prepara la consulta
        $sentencia->execute(); // ejecuta
        $brands = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
        return $brands;
    }

}