{include 'header.tpl'}

    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 my-4 caja_estilo_gris media">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h3>Panel de Administracion:</h3>
                <img class="media-object img-circle" src="{$foto}" alt="">
                <figure>Usuario: {$usuario}</figure>
            </div>
        </div>
    </div>

   <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7 my-2 mx-auto">
        <ul class="list-group">
            <li class="list-group-item list-group-item-secondary"><strong>Listado de publicaciones:</strong>
                <a class="btn btn-light ml-4 mr-5" href="nueva_publicacion">Crear publicacion</a>
            </li>
            {foreach $autos item= auto}              
                <li class="list-group-item list-group-item-dark media">    
                    <form action="eliminar_publicacion" method="post">
                        <div class="container">
                            <div class="row"> 
                                {if $Admin}
                                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <img class="media-object img-circle" src="{$auto->foto_perfil}" alt="">
                                        <p class="text-center">{$auto->user_name}</p>
                                    </div>
                                {/if}
                                <div class="text-center text-break list-group-item list-group-item-dark media {if $Admin} col-sm-12 col-md-9 col-lg-9 col-xl-9{else}col-sm-12 col-md-12 col-lg-12 col-xl-12 {/if}">
                                    <a class="btn btn-light mr-2" href="ver_mas/{$auto->id_auto}">Ver</a>
                                    <a class="btn btn-light mr-2" href="editar_publicacion/{$auto->id_auto}">Editar</a>
                                    <button name="id_auto_eliminar" type="submit" class="btn btn-danger" value= "{$auto->id_auto}">Eliminar</button>
                                    <hr>
                                    <b>{$auto->titulo}</b>
                                    <hr>
                                    {$auto->descripcion}
                                </div>
                            </div> 
                        </div>
                    </form>    
                </li>   
            {/foreach}
        </ul>
    </div> 
    
    {if $Admin}
        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-2 mx-auto">
            <ul class="list-group">
                <li class="list-group-item list-group-item-secondary"><strong>Listado de Marcas:</strong>
                    <a class="btn btn-light ml-4 mr-3" href="nueva_marca">Crear marca</a>
                </li>
                {foreach $marcas item= marca}              
                    <li class="list-group-item list-group-item-dark">    
                        <form action="eliminar_marca" method="post">
                            <a class="btn btn-light mr-2" href="editar_marca/{$marca->id_marca}">Editar</a>
                            <button name="id_marca_eliminar" type="submit" class="btn btn-danger" value= "{$marca->id_marca}">Eliminar</button>
                            {$marca->nombre_marca}
                        </form>    
                    </li>   
                {/foreach}
            </ul>
        </div>
    {/if}

                

{include 'footer.tpl'}