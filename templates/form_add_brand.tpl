{include 'header.tpl'}
<form action="crear_marca" method="post" class="my-4">
    <div class="row">

        <div class="col-12">
            <div class="form-group">
                <label>Ingrese nueva marca:</label>
                <input name="nombre_marca" type="text" class="form-control">
            </div>
        </div>

    </div>

    <button type="submit" class="btn btn-dark mr-2">Guardar</button>
    <a class="btn btn-light" href="administrador">Vover al panel</a>
</form>

{include 'footer.tpl'}