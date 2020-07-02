<?php

require_once 'libs/router/Router.php';
require_once 'api/comments-api.controller.php';

// creo el ruteador usando la libreria externa
$router = new Router();

// creo la tabla de ruteo
//$router->addRoute('comments', 'GET', 'CommentsApiController', 'getComments');
$router->addRoute('car/:ID/comments', 'GET', 'CommentsApiController', 'getCommentsByCar');
$router->addRoute('car/:ID/comment', 'DELETE', 'CommentsApiController', 'deleteComment');
$router->addRoute('car/:ID/comment', 'POST', 'CommentsApiController', 'insertComment');
//$router->addRoute('car/:ID/comment', 'UPDATE', 'CommentsApiController', 'editComment');



// rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);
