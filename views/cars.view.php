<?php

class CarsView{

    public function show_cars($autos){
        foreach ($autos as $auto) {
   
            echo ' <p>' . $auto->precio . "</p> - ";
            echo ' <p>' . $auto->titulo . "</p> - ";
            //foreach ($marcas as $marca) {
            echo ' <p>' . $auto->id_marca_fk.'</p> - ';
            //}

        }
    }
}