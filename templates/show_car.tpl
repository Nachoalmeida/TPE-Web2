{include 'header.tpl'}
  

            <!--iMAGEN-->
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <p></p>
                 <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        {foreach $fotos item= foto}          
                            {if $foto->id_auto_fk == $auto->id_auto} 
                                <div class="carousel-item  {if !$unaFoto}active{/if}"> 
                                    <img class="d-block w-100" src="{$foto->nombre}" alt="{$auto->titulo}">  
                                </div>  
                                {$unaFoto=1}                                                                     
                            {/if} 
                        {/foreach}                                       
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <!--FIN iMAGEN-->

            <!--DATOS TITULO-->
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                <p></p>
                <h3 class="">{$auto->titulo}</h3>
                <p></p>
                <p><strong class="">Marca:</strong> {$auto->nombre_marca}</p>
                <p><strong class="">Modelo:</strong> {$auto->modelo}</p>
                
            </div>
            <!--FIN DATOS TITULO-->

            <!--CAJA FICHA Datos-->
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <p></p>
                <h5 class="">Datos:</h5>
                <p><strong class="">Precio:</strong> ${$auto->precio}</p>
                <p><strong class="">Año:</strong> {$auto->anio}</p>
                <p><strong class="">Kilometros:</strong> {$auto->kilometros}Km</p>
                <a class="btn btn-dark" href="comprar">Comprar</a>
                <p></p>
            </div>
            <!--FIN FICHA Datos-->

            <!--CAJA Descripcion-->
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 caja_estilo_gris_claro">
                <p></p>
                <h4 class="text-center">Descripcion:</h4>
                <p class="text-center">{$auto->descripcion}</p>
            </div>

            {include 'panel_comments.tpl'}

            <!--FIN CAJA Descripcion-->
             <div class="caja_estilo_gris_claro col-sm-12 col-md-12 col-lg-12 col-xl-12">

                {if $Admin}
                    <form action="eliminar_publicacion" method="post">
                {/if}

                <a class="btn btn-light mr-2" href="inicio">Volver al Inicio</a>
                               
                {if $Admin}
                        <a class="btn btn-light mr-2" href="editar_publicacion/{$auto->id_auto}">Editar</a>
                        <button name="id_auto_eliminar" type="submit" class="btn btn-danger" value= "{$auto->id_auto}">Eliminar</button>                    
                    </form>    
                {/if}
            </div>



{include 'footer.tpl'}