<?php

class HelperSession {

    static public function access(){
        session_start();
        //preguntar, sin el isset anda igual???por que??
        if (!isset($_SESSION['logged'])){
            header('Location: ' . BASE_URL . 'ingresar');
            die; 
        }

    }
}














