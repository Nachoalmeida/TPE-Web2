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
    // inserta a la db
    public function insertBrand($brand_name){
        // abro la conexión con MySQL  
         $db = SystemModel::getConection();
        //envia la consulta
        $sentencia = $db->prepare("INSERT INTO marca (nombre_marca) VALUES(?)"); // prepara la consulta
        return $sentencia->execute([$brand_name]); // ejecuta
    }

}