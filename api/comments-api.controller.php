<?php

require_once 'models/comments.model.php';
require_once 'api/api.view.php';

class CommentsApiController{

    private $model;
    private $view;

    public function __construct() {
        $this->model =  new CommentsModel();
        $this->view = new APIView();
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

}