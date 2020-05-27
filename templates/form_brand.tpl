{include 'header.tpl'}
    <div class="container">
        <h1 class="mt-2">{if $marca} Editar marca {else} Nueva marca {/if}</h1>
        <form {if $marca} action="cargar_marca_editada" {else} action="crear_marca" {/if}method="post" class="my-4  was-validated">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label>{if $marca} Editar: {else} Ingrese nueva marca: {/if}</label>
                        <input name="nombre_marca" type="text" class="form-control" {if $marca} value="{$marca->nombre_marca}" {/if} required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-dark mr-2 mt-3" {if $marca} name="id_marca" value="{$marca->id_marca}" {/if}>Guardar</button>
            <a class="btn btn-light mt-3" href="administrador">Volver al panel</a>
        </form>
    </div>
{include 'footer.tpl'}