<?php

require_once 'models/comments.model.php';
require_once 'api/api.view.php';

class CommentsApiController{

    private $model;
    private $view;
    private $data;

    public function __construct() {
        $this->model =  new CommentsModel();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getCommentsByCar($params = []){
                    // obtengo el id de los params
        $idCar = $params[':ID'];

        /*$colname = null;
        if (isset($params[':COLNAME'])) {
            $colname = $params[':COLNAME'];
        }*/

        $comments = $this->model->getCommentsByCar($idCar);
        if ($comments)
            $this->view->response($comments, 200);
        else
            $this->view->response("Esta publicación no posee comentarios aún, puedes ser el primero!", 404);


    }

    public function deleteComment($params = []) {
        $idCar = $params[':ID'];
        $comments = $this->model->getCommentsByCar($idCar);

        if ($comments) {
            $this->model->deleteComment($idCar);
            $this->view->response($comments, 200);
        }
        else 
            $this->view->response("No se pudo eliminar el comentario", 404);
    }
    

    public function insertComment($params = []) {
        // devuelve el objeto JSON enviado por POST     
        $body = $this->getData();
        var_dump($body); die;

        // inserta la tarea
        $mensaje = $body->mensaje;
        $puntaje = $body->puntaje;
        $id_usuario = $body->id_usuario_fk;
        $id_auto = $params[':ID'];

        $success = $this->model->insertComment($mensaje, $puntaje, $id_usuario, $id_auto);

        if ($success)
        {
            $this->view->response("Se agrego el comentario", 200);
        }
        else
        {
            $this->view->response("El comentario no fue agregado", 500);
        }
    }

}