<?php

require_once 'system.model.php';

class PhotoModel extends SystemModel{

    // inserta a la db, una nueva foto a la publicacion
    public function insertByCar($id_car,$originalName=null,$physicalName){  

        if ($originalName)
            $pathImg = $this->uploadImage($originalName,$physicalName);

        //envia la consulta
        $success_img = $this->getDb()->prepare("INSERT INTO fotos (nombre,id_auto_fk ) VALUES(?,?)"); // prepara la consulta
        $success_img->execute([$pathImg,$id_car]);
        return $success_img;
    }

    private function uploadImage($originalName,$physicalName) {
        $finalName = "images/cars/".uniqid().uniqid("", true) . "." . strtolower(pathinfo($originalName, PATHINFO_EXTENSION));;
        move_uploaded_file($physicalName, $finalName);
        return $finalName;
    }

    public function getAllphotos(){
        //envia la consulta
        $sentencia = $this->getDb()->prepare("SELECT * FROM fotos"); // prepara la consulta
        $sentencia->execute(); // ejecuta
        $photos = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
        return $photos;
    }

} 
