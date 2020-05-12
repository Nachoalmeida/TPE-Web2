{include 'header.tpl'}

{foreach $autos item= auto}

  <a class="btn col-sm-12 col-md-3 col-lg-3 col-xl-3 caja_para_efecto_retraer" href="ver_mas/{$auto->id_auto}">
        <figure>
            <img class="tamano_categorias_img efecto_retraer_algo" src="{$auto->foto}" alt="{$auto->titulo}" />
        </figure>
        <div class="caja_estilo efecto_retraer_algo" >
            <h4 class="text-center efecto_retraer_algo">{$auto->titulo}</h4>
        </div>
    </a>
    
{/foreach}

{include 'footer.tpl'}