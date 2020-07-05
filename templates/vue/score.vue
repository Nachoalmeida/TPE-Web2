<section id="app-score">   
    <h6 v-show ="average != 0" class="text-center">Puntaje de los usuarios: <span class="badge badge-warning">{{ average }} / 5</span></h6>

    <h6 v-show ="average == 0" class="text-center">Puntaje de los usuarios: <span class="badge badge-warning">Sin puntuar</span></h6>
</section>