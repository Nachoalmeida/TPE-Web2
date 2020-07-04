"use strict"

// definimos la app Vue
let app = new Vue({
    el: "#app-comments",
    data: {
        //loading: false,
        //footer: "Este panel se renderiza con CSR ;)",
        comments: []
    },
    methods: {
        saludar: function(id_auto) {
            alert("hola: " + id_auto);
        }
    }
});

// asigno event listener al boton de refresh
//document.querySelector('#btn-refresh').addEventListener('click', cargar);

// paso el ID del auto (publicacion) en el que vamos a comentar
let id_auto = document.querySelector("input[id=idCar]").value;

// carga inicial de las tareas
cargarComentarios();
function cargarComentarios() {
    //app.loading = true;
    fetch('api/cars/'+id_auto+'/comments')
        .then(response => response.json())
        .then(comments => {
           // asigno las tareas que me devuelve la API
           app.comments = comments; // es como el $this->smarty->assign("tasks", tareas);
           //app.loading = false;
        });
}