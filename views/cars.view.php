<?php

class CarsView{

    public function show_cars($autos){
        foreach ($autos as $auto) {
   
            echo ' <p>' . $auto->precio . "</p> - ";
            echo ' <p>' . $auto->titulo . "</p> - ";
            echo ' <p>' . $auto->nombre_marca.'</p> - ';

        }
    }
}