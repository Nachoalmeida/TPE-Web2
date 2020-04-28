<?php

/**
 * Interactua con la tabla tareas
 */
class TaskModel {

    /**
     * Crear la conexion
     */
    private function createConection() {
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'db_tareas';

        try {
        $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName, $password);
        } catch (Exception $e) {
            var_dump($e);
        }
        return $pdo;
    }


    /**
     * Devuelve todas las tareas.
     */
    public function getAll() {
        // 1. abro la conexión con MySQL 
        $db = $this->createConection();

        // 2. enviamos la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT * FROM tareas"); // prepara la consulta
        $sentencia->execute(); // ejecuta
        $tareas = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

        return $tareas;
    }

    /**
     * Devuelve una tarea con el id determinado
     */
    public function get($idTask)
    {
        // 1. abro la conexión con MySQL 
        $db = $this->createConection();

        // 2. enviamos la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT * FROM tareas WHERE id_tarea = ?"); // prepara la consulta
        $sentencia->execute([$idTask]); // ejecuta
        $tarea = $sentencia->fetch(PDO::FETCH_OBJ); // obtiene la respuesta

        return $tarea;
    }

    /**
     * Inserta una tarea.
     */
    public function insert($titulo, $descripcion, $prioridad) {
        // 1. abro la conexión con MySQL 
        $db = $this->createConection();

        // 2. enviamos la consulta
        $sentencia = $db->prepare("INSERT INTO tareas(titulo, descripcion, prioridad) VALUES(?, ?, ?)"); // prepara la consulta
        $sentencia->execute([$titulo, $descripcion, $prioridad]); // ejecuta

    }

    public function finalize($idTask) {
        // 1. abro la conexión con MySQL 
        $db = $this->createConection();
    
        // 2. enviamos la consulta
       $sentencia = $db->prepare("UPDATE tareas SET finalizada = 1 WHERE id_tarea = ?"); // prepara la consulta
       $sentencia->execute([$idTask]); // ejecuta    
    }

    /**
     * Borra una tarea
     */
    public function delete($idTask) {
        // 1. abro la conexión con MySQL 
        $db = $this->createConection();

        // 2. enviamos la consulta
        $sentencia = $db->prepare("DELETE FROM tareas WHERE id_tarea = ?"); // prepara la consulta
        $sentencia->execute([$idTask]); // ejecuta    
    }
        
}