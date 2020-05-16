{include 'header.tpl'}

    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 my-4 caja_estilo_gris">
        <a class="btn btn-light ml-5 mr-5" href="nueva_publicacion">Crear publicacion</a>
        <a class="btn btn-light" href="nueva_marca">Crear marca</a>
    </div>

   <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 my-2 mx-auto">
        <ul class="list-group">
            <li class="list-group-item list-group-item-secondary"><strong>Listado de publicaciones:</strong></li>
            {foreach $autos item= auto}              
                <li class="list-group-item list-group-item-dark">    
                    <form action="eliminar_publicacion" method="post">
                        <a class="btn btn-light mr-2" href="editar_publicacion/{$auto->id_auto}">Editar</a>
                        <button name="id_auto_eliminar" type="submit" class="btn btn-danger" value= "{$auto->id_auto}">Eliminar</button>
                        {$auto->titulo}
                    </form>    
                </li>   
            {/foreach}
        </ul>
    </div> 
{include 'footer.tpl'}