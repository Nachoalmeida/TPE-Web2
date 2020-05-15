<?php

require_once('system.model.php');

class BrandsModel{
    // Devuelve todas las marcas.
    public function getAllBrands() {
        // abre la conexión con MySQL 
        $db = SystemModel::getConection();
        $sentencia = $db->prepare("SELECT * FROM marca"); // prepara la consulta
        $sentencia->execute(); // ejecuta
        $brands = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
        return $brands;
    }

}