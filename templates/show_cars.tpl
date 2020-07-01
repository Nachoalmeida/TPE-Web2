
{foreach $autos item= auto}

    <a class="btn col-sm-12 col-md-3 col-lg-3 col-xl-3 caja_para_efecto_retraer" href="ver_mas/{$auto->id_auto}">
        <div class="caja_estilo_gris efecto_retraer_algo" >
            <ul class="slider">
                {foreach $fotos item= foto}            
                    {if $foto->id_auto_fk == $auto->id_auto && $unaFoto==0} 
                        <li id="{$foto->nombre}"><img class="d-block w-100" src="{$foto->nombre}" alt="{$auto->titulo}"> </li> 
                        {$unaFoto=1}                                                                                
                    {/if} 
                   
                {/foreach}
            </ul>    
            <figcaption class="text-center">{$auto->titulo}</figcaption>
            <div class="caja_estilo_gris_claro">
                <h6 class="text-center"><strong class="">Precio:</strong> ${$auto->precio}</h6>
                <h6 class="text-center"><strong class="">Marca:</strong> {$auto->nombre_marca}</h6>
            </div>
        </div>
    </a>

   
    
{/foreach}

 
  