
{foreach $autos item= auto}

    <a class="btn col-sm-12 col-md-3 col-lg-3 col-xl-3 caja_para_efecto_retraer" href="ver_mas/{$auto->id_auto}">
        <div class="caja_estilo_gris efecto_retraer_algo" >
            <figure>
                <img class="tamano_categorias_img" src="{$auto->foto}" alt="{$auto->titulo}" />
                <figcaption class="text-center">{$auto->titulo}</figcaption>
            </figure>
            <div class="caja_estilo_gris_claro">
                <h6 class="text-center"><strong class="">Precio:</strong> ${$auto->precio}</h6>
            </div>
        </div>
    </a>
    
{/foreach}
