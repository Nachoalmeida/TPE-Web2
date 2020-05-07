<?php

class CarsView{

    public function show_cars($autos){
        foreach ($autos as $auto) {
            $idauto = $auto->id_auto;
            echo ' <p>' . $auto->precio . "</p>";
            echo ' <p>' . $auto->titulo . "</p>";
            echo ' <p>' . $auto->nombre_marca.'</p>';
            echo ' <a class="btn btn-info" href="ver mas/'.$idauto.'">ver mas</a>';
        }
    }

    public function show_car($auto){
        echo ' <p>' . $auto->nombre_marca . "</p>";
    }

    public function show_fail(){

        echo 'Error';
    }
}