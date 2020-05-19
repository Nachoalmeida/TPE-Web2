{include 'header.tpl'}
  

            <!--iMAGEN-->
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <p></p>
                <figure>
                    <img class="img_ver_mas" src="{$auto->foto}" alt="{$auto->titulo}" />
                </figure>
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
                <a class="btn btn-dark" href="Error">Comprar</a>
                <p></p>
            </div>
            <!--FIN FICHA Datos-->

            <!--CAJA Descripcion-->
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 caja_estilo_gris_claro">
                <p></p>
                <h4 class="text-center">Descripcion:</h4>
                <p class="text-center">{$auto->descripcion}</p>
            </div>
            <!--FIN CAJA Descripcion-->
             <div class="caja_estilo_gris_claro col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <a class="btn btn-light" href="inicio">Volver al Inicio</a>
            </div>
            



{include 'footer.tpl'}