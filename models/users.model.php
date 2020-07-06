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
    public function insert($user_name, $pass, $mail,$finalName=null){
        $sentencia = $this->getDb()->prepare("INSERT INTO usuarios(user_name, password, mail, foto_perfil) VALUES(?, ?, ?, ?)"); // prepara la consulta
        $sentencia->execute([$user_name, $pass, $mail, $finalName]);

        $lastId = $this->getDb()->lastInsertId();
        return  $lastId; 
    }

    public function copyImage($originalName, $physicalName){
        
        $finalName = "images/user_foto/". uniqid("", true) . "." . strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

        move_uploaded_file($physicalName, $finalName); 
        
        return $finalName;
    }

    public function insertImage($user_name, $pass, $mail, $originalName,$physicalName){ 
        $finalName = $this->copyImage($originalName, $physicalName);
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

    public function getAllUsers(){
        //envio consulta
        $sentencia = $this->getDb()->prepare("SELECT * FROM usuarios ORDER BY administrador DESC, user_name"); // prepara la consulta
        $sentencia->execute(); // ejecuta
        $users = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
        return $users;
    }

    public function deleteUser($id_user,$route){
        // enviamos la consulta
        $sentencia = $this->getDb()->prepare("DELETE FROM usuarios WHERE id_usuario = ?"); // prepara la consulta
        $sentencia->execute([$id_user]); // ejecuta
        
        if($sentencia && $route != 'images/user_foto/user.png'){
            unlink($route);
        }
    
        return $sentencia;
    }

    public function getUser($id_user){
        //envio consulta
        $sentencia = $this->getDb()->prepare("SELECT * FROM usuarios WHERE id_usuario= ?"); // prepara la consulta
        $sentencia->execute([$id_user]); // ejecuta
        $user = $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta
        return $user;
    }

    public function modifyRole($id_user,$role){
        $sentencia = $this->getDb()->prepare("UPDATE usuarios SET administrador= ?WHERE id_usuario = ?"); // prepara la consulta
       return $sentencia->execute([$role, $id_user]); // ejecuta    
    }
//NUEVO*********************************************************************************************************************
}