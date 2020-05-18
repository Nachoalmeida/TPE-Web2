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
    // Devuelve la marca
    public function getBrand($id_brand) {
            // abre la conexión con MySQL 
            $db = SystemModel::getConection();
            $sentencia = $db->prepare("SELECT * FROM marca WHERE id_marca=?"); // prepara la consulta
            $sentencia->execute([$id_brand]); // ejecuta
            $brand = $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta
            return $brand;
    }

    //edita una marca
    public function editBrand($id_brand,$brand_name){
        // 1. abro la conexión con MySQL 
        $db = SystemModel::getConection(); 
        // 2. enviamos la consulta //importante si es un string la variable va entre ''
        $sentencia = $db->prepare("UPDATE marca SET nombre_marca='$brand_name' WHERE id_marca = ?"); // prepara la consulta
        return $sentencia->execute([$id_brand]); // ejecuta    
    }
    
    

}