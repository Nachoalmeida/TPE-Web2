<?php

class CarsView{

    public function show_cars($autos){
        foreach ($autos as $auto) {
    
            echo '<li class="list-group-item">';
    
            echo ' <b>' . $auto->precio . "</b> - ";
            echo ' <b>' . $auto->titulo . "</b> - ";
            echo ' <b>' . $auto->id_marca_fk . "</b> - ";
        }
    }
}