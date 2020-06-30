<?php

require_once 'system.model.php';

class CommentsModel extends SystemModel{

    public function getCommentsByCar($idCar){
        // envia la consulta
        $sentencia = $this->getDb()->prepare("SELECT * FROM comentarios JOIN autos ON (id_auto_fk=id_auto) WHERE id_auto_fk = ?"); // prepara la consulta
        $sentencia->execute([$idCar]); // ejecuta
        $comments = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
        return $comments;
    }
}