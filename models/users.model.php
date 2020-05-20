<?php

require_once('system.model.php');

class UsersModel{

    public function getUser($mail){
        // abre la conexión con MySQL 
        $db = SystemModel::getConection();
        //envio consulta
        $sentencia = $db->prepare("SELECT * FROM usuarios WHERE mail=?"); // prepara la consulta
        $sentencia->execute([$mail]); // ejecuta
        $user = $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta
        return $user;

    }



}