<?php

require_once 'system.model.php';

class CommentsModel extends SystemModel{

    public function getCommentsByCar($idCar){
        // envia la consulta
        $sentencia = $this->getDb()->prepare("SELECT * FROM comentarios JOIN usuarios ON (id_usuario_fk=id_usuario) WHERE id_auto_fk = ? ORDER BY id_comentario DESC"); // prepara la consulta
        $sentencia->execute([$idCar]); // ejecuta
        $comments = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
        return $comments;
    }

    public function deleteComment($idComment){
        // envia la consulta
        $sentencia = $this->getDb()->prepare("DELETE FROM comentarios WHERE id_comentario = ?"); // prepara la consulta
        return $sentencia->execute([$idComment]); // ejecuta    
        
    }

    public function insertComment($mensaje, $puntaje, $id_usuario, $id_auto) {
        $sentencia = $this->getDb()->prepare("INSERT INTO comentarios(mensaje, puntaje, id_usuario_fk, id_auto_fk) VALUES(?, ?, ?, ?)"); // prepara la consulta
        return $sentencia->execute([$mensaje, $puntaje, $id_usuario, $id_auto]);
 
    }

    public function editComment($mensaje, $puntaje, $id_comentario) {
        $sentencia = $this->getDb()->prepare("UPDATE comentarios SET mensaje=?, puntaje=? WHERE id_comentario=?"); // prepara la consulta
        return $sentencia->execute([$mensaje, $puntaje, $id_comentario]);
 
    }

    public function getComment($idComment){
        // envia la consulta
        $sentencia = $this->getDb()->prepare("SELECT * FROM comentarios WHERE id_comentario = ?"); // prepara la consulta
        $sentencia->execute([$idComment]); // ejecuta
        $comment = $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta
        return $comment;
    }


}