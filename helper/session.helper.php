<?php

class HelperSession {

    static public function access(){
        session_start();
        if (!isset($_SESSION['logged'])){
            header('Location: ' . BASE_URL . "ingresar");
            die;
        }

    }
    static public function accessAdmin(){
        if(session_status() != PHP_SESSION_ACTIVE){   
            session_start();
        }
        if (!($_SESSION['admin'])){
            header('Location: ' . BASE_URL . "ingresar");
            die;
        }

    }
    //PREGUNTAR POR IFS
    static public function accessAdmin_view(){
        if(session_status() != PHP_SESSION_ACTIVE){   
            session_start();
        }
        if (isset($_SESSION['logged'])){
            if (($_SESSION['admin'])){
                $admin=$_SESSION['admin'];
                return $admin;
            }
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














