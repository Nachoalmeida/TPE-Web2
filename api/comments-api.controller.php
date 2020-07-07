<?php

require_once 'models/comments.model.php';
require_once 'api/api.view.php';


class CommentsApiController
{

    private $model;
    private $view;
    private $data;

    public function __construct()
    {
        $this->model =  new CommentsModel();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
    }

    private function getData()
    {
        return json_decode($this->data);
    }

    public function getCommentsByCar($params = [])
    {
        // obtengo el id de los params
        $idCar = $params[':ID'];

        if (empty($idCar)) {
            $this->view->response("Parametro vacio", 404);
            die;
        }

        $comments = $this->model->getCommentsByCar($idCar);

        if ($comments)
            $this->view->response($comments, 200);
        else
            $this->view->response(null, 204);
    }

    public function deleteComment($params = [])
    {
        $idComment = $params[':ID'];

        if (empty($idComment)) {
            $this->view->response("Falta el ID del comentario que desea eliminar", 404);
            die;
        }

        $comentario = $this->model->getComment($idComment);

        // verifico que exista
        if (empty($comentario)) {
            $this->view->response("No existe el comentario", 204);
            die();
        }

        $success = $this->model->deleteComment($idComment);

        if ($success) {
            $this->view->response("Se eliminó el comentario", 200);
        } else
            $this->view->response("No se pudo eliminar el comentario", 404);
    }


    public function insertComment($params = [])
    {
        // devuelve el objeto JSON enviado por POST     
        $body = $this->getData();

        // inserta la tarea
        $mensaje = $body->mensaje;
        $puntaje = $body->puntaje;
        $id_usuario = $body->id_usuario_fk;
        $id_auto = $params[':ID'];


        if (
            empty($mensaje) || empty($puntaje) || empty($id_usuario) ||
            empty($id_auto) || $puntaje < 1 || $puntaje > 5
        ) {
            $this->view->response("Fatan datos obligatorios", 404);
            die;
        }

        $success = $this->model->insertComment($mensaje, $puntaje, $id_usuario, $id_auto);

        if ($success) {
            $this->view->response("Se agrego el comentario", 200);
        } else {
            $this->view->response("El comentario no fue agregado", 500);
        }
    }
}
