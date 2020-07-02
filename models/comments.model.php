<?php

require_once 'system.model.php';

class CommentsModel extends SystemModel{

    public function getCommentsByCar($idCar){
        // envia la consulta
        $sentencia = $this->getDb()->prepare("SELECT * FROM comentarios WHERE id_auto_fk = ?"); // prepara la consulta
        $sentencia->execute([$idCar]); // ejecuta
        $comments = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
        return $comments;
    }

    public function deleteComment($idCar){
        // envia la consulta
        $sentencia = $this->getDb()->prepare("DELETE FROM comentarios WHERE id_auto_fk = ?"); // prepara la consulta
        return $sentencia->execute([$idCar]); // ejecuta    
        
    }

    public function insertComment($mensaje, $puntaje, $id_usuario, $id_auto) {
        $sentencia = $this->getDb()->prepare("INSERT INTO comentarios(mensaje, puntaje, id_usuario, id_auto) VALUES(?, ?, ?, ?)"); // prepara la consulta
        return $sentencia->execute([$mensaje, $puntaje, $id_usuario, $id_auto]);
 
    }

}