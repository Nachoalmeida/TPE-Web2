{include 'header.tpl'}
<form action="editar_auto" method="post" class="my-4" enctype="multipart/form-data">
    <div class="container">

        <h1 class="mt-2">Editar Publicación</h1>

        <div class="col-12">
            <hr>
            <h2 class="mt-2">Subir nuevas imagenes:</h2>
            <div class="custom-file">
                <input name="imagesToUpload[]" id="imagesToUpload" type="file" class="custom-file-input"value="{$auto->foto}" multiple>
                <label class="custom-file-label" for="validatedCustomFile">Subir imagen...</label>
            </div>
        
            <button type="submit" class="btn btn-dark mr-2 my-3" name="id_auto_editar" value="{$auto->id_auto}">Guardar</button>
                
            <hr>
            <h2 class="mt-2">Mis imagenes:</h2>
            {foreach $fotos item= foto}  
                <a class="btn col-sm-3 col-md-3 col-lg-3 col-xl-3 caja_para_efecto_retraer" href="eliminar_foto/{$auto->id_auto}/{$foto->id_foto}">
                    <div class="caja_estilo_gris efecto_retraer_algo  caja_cont_img_galeria" >
                        <ul class="cont_img_galeria slider">
                            <figure class="img_galeria">
                                <li id="{$foto->nombre}"><img class="d-block w-100" src="{$foto->nombre}" alt="{$auto->titulo}"> </li> 
                                <div class="overlay">
                                    <h2>Eliminar</h2>
                                </div> 
                            </figure>
                        </ul>  
                    </div>
                </a>
            {/foreach}

        </div>
        <hr>
    </div>

    <div class="text-dark alert-light">
        {include 'show_form_view.tpl'}
    </div>
</form>


{include 'footer.tpl'}