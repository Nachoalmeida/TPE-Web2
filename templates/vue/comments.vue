
<section id="app-comments">

    <input id="idCar" type="hidden" value={$auto->id_auto}>

    <div v-if = "comments">
        <div v-for="comment in comments"  >
            <div class="alert " :class ="{ 'alert-dark': comment.id_comentario % 2 ==0, 'alert-light': comment.id_comentario % 2 !=0 }" role="alert">
                <div class="container" >
                    <div class="row media">

                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-mr-5">
                            <a class="pull-left zoom-item">
                                <img class="media-object img-circle" :src="comment.foto_perfil" alt="profile">
                                <h6 class="text-center">calificación: <span class="badge badge-warning">{{ comment.puntaje }}</span></h6>
                            </a>
                        </div>
                        
                        <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7">
                            
                            <!-- foreach de vue -->
                            <h6 class="p-4 text-dark border border-secondary list-group-item my-5 ml-3 alert-heading ">
                                {{ comment.mensaje }} 
                                
                            </h6>
                            <hr>   
                        
                            <button v-if = "admin != 0" name="id_comentario_eliminar" type="button" class="btn btn-outline-danger btn-sm float-right" v-on:click="deleteComment(comment.id_comentario)">Eliminar comentario..</button>
                        </div>
                    </div>
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


