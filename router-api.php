<?php

require_once 'libs/router/Router.php';
require_once 'api/comments-api.controller.php';

// creo el ruteador usando la libreria externa
$router = new Router();

// creo la tabla de ruteo
$router->addRoute('cars/:ID/comments', 'GET', 'CommentsApiController', 'getCommentsByCar');
$router->addRoute('comments/:ID', 'DELETE', 'CommentsApiController', 'deleteComment');
$router->addRoute('cars/:ID/comments', 'POST', 'CommentsApiController', 'insertComment');
$router->addRoute('comments/:ID', 'PUT', 'CommentsApiController', 'editComment');

// rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);
