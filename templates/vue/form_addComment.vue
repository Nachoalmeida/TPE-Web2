

<section id="app-form-comments"> 
    <input type="hidden" name="logueo" value="{$logueo}">
    <form v-show="user" class="my-4 ">
        <div class="form-group">
            <textarea v-model="mensaje" class="form-control" name="mensaje" placeholder="Comenta algo.." required></textarea>
            <input type="hidden" name="id_usuario_fk" value="{$user_id}">   
            <div v-show="mensaje">    
                <hr>
                <select v-model="puntaje" class="custom-select col-4" name="puntaje" required>
                    <option value="">Puntúa la publicación!!</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                <input type="hidden" name="id_auto" value={$auto->id_auto}> 
            </div>
            <div v-show="alert" class="alert alert-danger my-3" role="alert">
                Faltan datos
            </div>
        </div>       
        <button type="button" v-on:click="addComment()" class="btn btn-dark"><b>Publicar</b></button>
    </form>
    <div v-show="!user">
        <a class="btn btn-outline-light my-2" href="registrarse">Registrate para comentar</a>
    </div>
    <input type="hidden" name="admin" value="{$Admin}">
</section>
