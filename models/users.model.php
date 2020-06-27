<?php

require_once 'system.model.php';

class UsersModel extends SystemModel{

    public function getUserMail($mail){
        //envio consulta
        $sentencia = $this->getDb()->prepare("SELECT * FROM usuarios WHERE mail= ?"); // prepara la consulta
        $sentencia->execute([$mail]); // ejecuta
        $user = $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta
        return $user;
    }

//NUEVO*********************************************************************************************************************
    public function insert($user_name, $pass, $mail,$nombreFinal=null){
        $sentencia = $this->getDb()->prepare("INSERT INTO usuarios(user_name, password, mail, foto_perfil) VALUES(?, ?, ?, ?)"); // prepara la consulta
        $sentencia->execute([$user_name, $pass, $mail, $nombreFinal]);

        $lastId = $this->getDb()->lastInsertId();
        return  $lastId; 
    }

    public function copyImage(){
        // Nombre archivo original
        $originalName = $_FILES['input_name']['name'];
        // Nombre en el file system:
        $physicalName = $_FILES['input_name']['tmp_name'];
        
        $finalName = "images/user_foto/". uniqid("", true) . "." . strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

        move_uploaded_file($physicalName, $finalName); 
        
        return $finalName;
    }

    public function insertImage($user_name, $pass, $mail){ 
        $finalName = $this->copyImage();
        $success = $this->insert($user_name, $pass, $mail, $finalName);
        return $success;
    }

    public function getUserName($user_name){
        //envio consulta
        $sentencia = $this->getDb()->prepare("SELECT * FROM usuarios WHERE user_name= ?"); // prepara la consulta
        $sentencia->execute([$user_name]); // ejecuta
        $user = $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta
        return $user;
    }
//NUEVO*********************************************************************************************************************
}