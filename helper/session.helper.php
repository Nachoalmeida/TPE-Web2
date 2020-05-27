<?php

class HelperSession {

    static public function access(){
        session_start();
        if (!isset($_SESSION['logged'])){
            header('Location: ' . BASE_URL . "ingresar");
            die;
        }

    }
    static public function access_view(){
        if(session_status() != PHP_SESSION_ACTIVE){   
            session_start();
        }
        if (isset($_SESSION['logged'])){
            return true;
        }
    }         
}














