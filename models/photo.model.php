<?php

require_once 'system.model.php';

class PhotoModel extends SystemModel{

    // inserta a la db, una nueva foto a la publicacion
    public function insertByCar($id_car,$originalName,$physicalName){  

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


    // trae solo las fotos con una publicacion especifica
    public function getPhotosByCar($id_car){
        // envia la consulta
        $sentencia = $this->getDb()->prepare("SELECT * FROM fotos WHERE id_auto_fk = ?"); // prepara la consulta
        $sentencia->execute([$id_car]); // ejecuta
        $photosCar = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
        return $photosCar;
    }

    public function deletePhoto($id_foto,$route){
        // enviamos la consulta
        $sentencia = $this->getDb()->prepare("DELETE FROM fotos WHERE id_foto = ?"); // prepara la consulta
        $sentencia->execute([$id_foto]); // ejecuta  
        if($sentencia){
            unlink($route);
        }
        return $sentencia;
    }

    public function getPhoto($id_foto){
         // envia la consulta
         $sentencia = $this->getDb()->prepare("SELECT * FROM fotos WHERE id_foto = ?"); // prepara la consulta
         $sentencia->execute([$id_foto]); // ejecuta
         $photo = $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta
         return $photo;
    }

} 
