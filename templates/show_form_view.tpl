{include 'header.tpl'}

<div class="container">
    
        <h1 class="mt-2">Alta de Publicación</h1>

        <form action="nuevo_auto" method="post" class="my-4">
            <div class="row">

            <div class="col-3">
                    <div class="form-group">
                        <label>Marca</label>
                        <select name="nombre_marca" class="form-control">
                        {foreach $marcas item= marca}
                        <option value="{$marca->id_marca}">{$marca->nombre_marca}</option>
                        {/foreach}
                        </select>
                    </div>
            </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Título</label>
                        <input name="titulo" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Modelo</label>
                        <input name="modelo" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>precio</label>
                        <input name="precio" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>kilometros</label>
                        <input name="kilometros" type="text" class="form-control">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Foto(URL)</label>
                        <input name="foto" type="text" class="form-control">
                    </div>
                </div>

                
                <div class="col-3">
                    <div class="form-group">
                        <label>Año</label>
                        <select name="anio" class="form-control">
                            {while  $cont< 50}
                                {$cont++}
                                <option value="{$anios}">{$anios}</option>
                                {$anios--}
                            {/while}
                        </select>   
                    </div>
                </div>
                
            </div>
        
            <div class="form-group">
                <label>Descripcion</label>
                <textarea name="descripcion" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-dark mr-2">Guardar</button>
            <a class="btn btn-light" href="administrador">Vover al panel</a>
        </form>
        </div>

{include 'footer.tpl'}