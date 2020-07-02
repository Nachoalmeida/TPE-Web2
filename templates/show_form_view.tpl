{include 'header.tpl'}

<div class="container">
    
    <h1 class="mt-2">{if $auto} Editar Publicación {else} Alta de Publicación {/if}</h1>

    <form {if $auto} action="editar_auto" {else} action="nuevo_auto" {/if} method="post" class="my-4 was-validated" enctype="multipart/form-data">
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label>Marca:</label>
                    <select name="nombre_marca" class="custom-select" required>                   
                    <option {if $auto} value="{$auto->id_marca}"{else}value=""{/if}>{if $auto}{$auto->nombre_marca}{else}Seleccione una Marca{/if}</option>                   
                    {foreach $marcas item= marca}
                        {if $auto->nombre_marca ne $marca->nombre_marca}
                            <option value="{$marca->id_marca}">{$marca->nombre_marca}</option>
                        {/if}
                    {/foreach}
                    </select>
                    <a class="btn btn-light mt-1" href='nueva_marca'>Nueva Marca..</a>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label>Título:</label>
                    <input name="titulo" type="text" class="form-control"{if $auto} value="{$auto->titulo}" {/if} required>                                       
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label>Modelo:</label>
                    <input name="modelo" type="text" class="form-control" {if $auto} value="{$auto->modelo}" {/if}required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Precio:</label>
                    <input name="precio" type="text" class="form-control" {if $auto}value="{$auto->precio}"{/if}required>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label>kilometros:</label>
                    <input name="kilometros" type="text" class="form-control" {if $auto}value="{$auto->kilometros}"{/if} required>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label>Año:</label>
                    <select name="anio" class="custom-select" required>
                        <option {if $auto} value="{$auto->anio}" {else} value="" {/if}>{if $auto} {$auto->anio} {else}Seleccione un año {/if}</option>
                        {while  $cont< 100}
                            {$cont++}
                            {if $anios ne $auto->anio}
                            <option value="{$anios}">{$anios}</option>
                            {/if}
                            {$anios--}
                        {/while}
                    </select>   
                </div>
            </div>   
            
            <div class="col-12">
                <label>Imagen:</label>
                <div class="custom-file">
                    <input name="imagesToUpload[]" id="imagesToUpload" type="file" class="custom-file-input"{if $auto}value="{$auto->foto}"{/if} multiple {if !$auto}required{/if} >
                    <label class="custom-file-label" for="validatedCustomFile">Subir imagen...</label>
                </div>
                {if $auto}
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
                {/if}
            </div>
        </div>
        
        <div class="form-group">
            <label>Descripcion:</label>
            <textarea name="descripcion" class="form-control" rows="3" required>{if $auto}{$auto->descripcion}{/if}</textarea>
        </div>

        <button type="submit" class="btn btn-dark mr-2" {if $auto} name="id_auto_editar" value="{$auto->id_auto}" {/if}>Guardar</button>
        <a class="btn btn-light" href="administrador">Volver al panel</a>

    </form>
</div>

{include 'footer.tpl'}