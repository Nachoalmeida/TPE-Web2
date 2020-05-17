{include 'header.tpl'}

<div class="container">
    
        <h1 class="mt-2">Editar Publicación</h1>

        <form action="editar_auto" method="post" class="my-4">
            <div class="row">

            <div class="col-3">
                    <div class="form-group">
                        <label>Marca:</label>
                        <select name="nombre_marca" class="form-control">
                        <option value="{$auto->id_marca}">{$auto->nombre_marca}</option>
                        {foreach $marcas item= marca}
                            {if $marca->nombre_marca ne $auto->nombre_marca}     
                                <option value="{$marca->id_marca}">{$marca->nombre_marca}</option>
                            {/if}
                        {/foreach}
                        </select>
                    </div>
            </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Título:</label>
                        <input name="titulo" type="text" class="form-control" value="{$auto->titulo}">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Modelo:</label>
                        <input name="modelo" type="text" class="form-control" value="{$auto->modelo}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Precio:</label>
                        <input name="precio" type="text" class="form-control" value="{$auto->precio}">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>kilometros:</label>
                        <input name="kilometros" type="text" class="form-control" value="{$auto->kilometros}">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Foto(URL):</label>
                        <input name="foto" type="text" class="form-control" value="{$auto->foto}">
                    </div>
                </div>

                
                <div class="col-3">
                    <div class="form-group">
                        <label>Año:</label>
                        <select name="anio" class="form-control">
                            <option value="{$auto->anio}">{$auto->anio}</option>
                            {while  $cont< 50}
                                {$cont++}
                                {if $anios ne $auto->anio}
                                <option value="{$anios}">{$anios}</option>
                                {/if}
                                {$anios--}
                            {/while}
                        </select>   
                    </div>
                </div>
                
            </div>
        
            <div class="form-group">
                <label>Descripcion:</label>
                <textarea name="descripcion" class="form-control" rows="3">{$auto->descripcion}</textarea>
            </div>
            <button name="id_auto_editar" type="submit" class="btn btn-dark" value= "{$auto->id_auto}">Guardar</button>

            <a class="btn btn-light" href="administrador">Vover al panel</a>
        </form>
        </div>

{include 'footer.tpl'}