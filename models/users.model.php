<?php

require_once('system.model.php');

class UsersModel extends SystemModel{

    public function getUser($mail){
        //envio consulta
        $sentencia = $this->getDb()->prepare("SELECT * FROM usuarios WHERE mail=?"); // prepara la consulta
        $sentencia->execute([$mail]); // ejecuta
        $user = $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta
        return $user;

    }
}