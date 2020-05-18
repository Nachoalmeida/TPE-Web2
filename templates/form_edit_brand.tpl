{include 'header.tpl'}
    <div class="container">
        <h1 class="mt-2">Editar marca</h1>
        <form action="cargar_marca_editada" method="post" class="my-4">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label>Editar:</label>
                        <input name="nombre_marca" type="text" class="form-control" value="{$marca->nombre_marca}">
                    </div>
                </div>
            </div>
            <button type="submit" name="id_marca" value="{$marca->id_marca}" class="btn btn-dark mr-2 mt-3">Guardar</button>
            <a class="btn btn-light mt-3" href="administrador">Vover al panel</a>
        </form>
    </div>
{include 'footer.tpl'}