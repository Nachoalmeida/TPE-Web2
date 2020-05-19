{include 'header.tpl'}
    <div class="container">
        <h1 class="mt-2">Nueva marca</h1>
        <form action="crear_marca" method="post" class="my-4">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label>Ingrese nueva marca:</label>
                        <input name="nombre_marca" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-dark mr-2 mt-3">Guardar</button>
            <a class="btn btn-light mt-3" href="administrador">Volver al panel</a>
        </form>
    </div>
{include 'footer.tpl'}