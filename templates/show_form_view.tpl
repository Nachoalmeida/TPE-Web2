{include 'header.tpl'}

<div class="container">
    
    <h1 class="mt-2">Alta de Publicación</h1>

    <form action="nuevo_auto" method="post" class="my-4 was-validated">
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label>Marca:</label>
                    <select name="nombre_marca" class="custom-select" required>
                    <option value="">Seleccione una Marca</option>
                    {foreach $marcas item= marca}
                    <option value="{$marca->id_marca}">{$marca->nombre_marca}</option>
                    {/foreach}
                    </select>
                    <a class="btn btn-light mt-1" href='nueva_marca'>Nueva Marca..</a>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label>Título:</label>
                    <input name="titulo" type="text" class="form-control" required>                    
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label>Modelo:</label>
                    <input name="modelo" type="text" class="form-control" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Precio:</label>
                    <input name="precio" type="text" class="form-control" required>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label>kilometros:</label>
                    <input name="kilometros" type="text" class="form-control" required>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label>Foto(URL):</label>
                    <input name="foto" type="text" class="form-control" required>
                </div>
            </div>

            
            <div class="col-3">
                <div class="form-group">
                    <label>Año:</label>
                    <select name="anio" class="custom-select" required>
                        <option value="">Seleccione un año</option>
                        {while  $cont< 100}
                            {$cont++}
                            <option value="{$anios}">{$anios}</option>
                            {$anios--}
                        {/while}
                    </select>   
                </div>
            </div>     
        </div>
        
        <div class="form-group">
            <label>Descripcion:</label>
            <textarea name="descripcion" class="form-control" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-dark mr-2">Guardar</button>
        <a class="btn btn-light" href="administrador">Volver al panel</a>

    </form>
</div>

{include 'footer.tpl'}