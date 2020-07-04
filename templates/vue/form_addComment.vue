<section id="app-form-comments">    
    <form id="form-comentario" class="contenedor-form-comentario" method="POST">
        <textarea class="cajas-form-comentario" name="mensaje" placeholder="COMENTARIO" maxlength="200" required></textarea>
        <input type="hidden" name="id_usuario_fk" value="18">
        <!--<input type="hidden" name="zona_fecha" value="{date_default_timezone_set("America/Argentina/Buenos_aires")}">
        <input type="hidden" name="fecha" value="{date("d-m-o")} - {date("h:i a")}">-->
        <select class="cajas-form-comentario" name="puntaje" required>
            <option value="0">Elige un Puntaje</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
        <input type="hidden" name="id_auto" value={$auto->id_auto}>
        <button type="submit" v-on:click="addComment()" class="btn btn-danger centrar btn_alta"><b>Publicar</b></button>
    </form>
</section>
<!--
                <form action="comentar" method="post" class="my-4">
                    <div class="form-group">
                        <textarea name="mensaje" class="form-control" rows="3"></textarea>   
                    </div>
                    <button type="submit" class="btn btn-light mr-2" id="btn-comment" name="" value="">Comentar</button>
                    
                </form>-->
