<section id="app-comments">

    <input id="idCar" type="hidden" value={$auto->id_auto}>

    <div v-if = "comments" class="alert alert-dark" role="alert">
        <div v-for="comment in comments"  class="container">
            <div class="row media">

                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-mr-5">
                    <a class="pull-left" href="#">
                        <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg" alt="profile">
                    </a>
                </div>
                
                <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7">
                    
                    
                    <!-- foreach de vue -->
                    <h6 class="alert-heading ">
                        {{ comment.mensaje }} 
                    </h6>
                    <hr>

                    <button v-if = "admin" name="id_comentario_eliminar" type="button" class="btn btn-danger" v-on:click="deleteComment(comment.id_comentario)">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <div v-else class="alert alert-dark" role="alert">
        <div class="container">
            <div class="row media">

                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                    <p class="text-center"> 
                        No hay comentarios  
                    </p>
                         
                </div>
            </div>
        </div>
    </div>



</section>


