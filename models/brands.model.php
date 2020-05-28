<?php

require_once 'system.model.php';

class BrandsModel extends SystemModel{
    // Devuelve todas las marcas:
    public function getAllBrands() {
        $sentencia = $this->getDb()->prepare("SELECT * FROM marcas"); // prepara la consulta
        $sentencia->execute(); // ejecuta
        $brands = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
        return $brands;
    }
    // inserta a la db:
    public function insertBrand($brand_name){
        //envia la consulta:
        $sentencia = $this->getDb()->prepare("INSERT INTO marcas (nombre_marca) VALUES(?)"); // prepara la consulta
        return $sentencia->execute([$brand_name]); // ejecuta
    }
    // Devuelve la marca:
    public function getBrand($id_brand) {
        $sentencia = $this->getDb()->prepare("SELECT * FROM marcas WHERE id_marca=?"); // prepara la consulta
        $sentencia->execute([$id_brand]); // ejecuta
        $brand = $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta
        return $brand;
    }
    //edita una marca:
    public function editBrand($id_brand,$brand_name){  
        $sentencia = $this->getDb()->prepare("UPDATE marcas SET nombre_marca= ? WHERE id_marca = ?");
        return $sentencia->execute([$brand_name,$id_brand]); // ejecuta    
    }
    //elimina una marca:
    public function deleteBrand($id_brand) {
        // enviamos la consulta
        $sentencia = $this->getDb()->prepare("DELETE FROM marcas WHERE id_marca = ?"); // prepara la consulta
        return $sentencia->execute([$id_brand]); // ejecuta    
    }
}