
<input type="hidden" name="logueo" value="{$logueo}"> 
<section  id="app-form-comments"> 
    <input type="hidden" name="admin" value="{$Admin}">
    <form v-if = "logueo" class="contenedor-form-comentario my-4">
        <div class="form-group">
            <textarea class="cajas-form-comentario form-control" rows="3" name="mensaje" placeholder="COMENTARIO" maxlength="200" required></textarea>
            <input type="hidden" name="id_usuario_fk" value="{$user_id}">
            <select class="cajas-form-comentario" name="puntaje" required>
                <option value="0">Elige un Puntaje</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
            <input type="hidden" name="id_auto" value={$auto->id_auto}>
            
        </div>
        
        <button type="button" v-on:click="addComment()" class="btn btn-danger centrar btn_alta"><b>Publicar</b></button>
    </form>
</section>
