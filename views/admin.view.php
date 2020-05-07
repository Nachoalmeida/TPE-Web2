<?php

class AdminView{

    private function encabezado() {
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="' . BASE_URL . '">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <title>Lista de tareas</title>
        </head>
        <body>
    
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary mb-3">
            <a class="navbar-brand" href="">TODOList</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="listar">Home <span class="sr-only">(current)</span></a>
                </li>
                </ul>
            </div>
            </nav>';
    
        return $html;
    }

    private function footer() {
        $footer = '
        </body>
        </html>';

        return $footer;
    }

    public function show_form_view(){

        echo $this->encabezado();

        //Formulario ABM
        echo '<div class="container">
    
        <h1>Alta de Publicación</h1>

        <form action="nuevo_auto" method="post" class="my-4">
            <div class="row">
                <div class="col-9">
                    <div class="form-group">
                        <label>Título</label>
                        <input name="titulo" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-9">
                    <div class="form-group">
                        <label>Modelo</label>
                        <input name="modelo" type="text" class="form-control">
                    </div>
                </div>


                <div class="col-3">
                    <div class="form-group">
                        <label>Año</label>
                        <select name="anio" class="form-control">
                        <option value="1">2020</option>
                        <option value="2">2019</option>
                        <option value="3">2018</option>
                        <option value="4">2017</option>
                        <option value="5">2016</option>
                        <option value="6">2015</option>
                        <option value="7">2014</option>
                        <option value="8">2013</option>
                        <option value="9">2012</option>
                        <option value="10">2011</option>
                        <option value="11">2010</option>
                        <option value="12">2009</option>
                        <option value="13">2008</option>
                        <option value="14">2007</option>
                        <option value="15">2006</option>
                        <option value="16">2005</option>
                        <option value="17">2004</option>
                        <option value="18">2003</option>
                        <option value="19">2002</option>
                        <option value="20">2001</option>
                        <option value="21">2000</option>
                        <option value="22">1999</option>
                        <option value="23">1998</option>
                        <option value="24">1997</option>
                        <option value="25">1996</option>

                        </select>
                    </div>
                </div>
            </div>
        
            <div class="form-group">
                <label>Descripcion</label>
                <textarea name="descripcion" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        </div>
';

       echo $this->footer(); 

    }
}