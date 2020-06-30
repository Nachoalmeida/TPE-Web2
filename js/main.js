"use strict"
/*
// definimos la app Vue
let app = new Vue({
    el: "#app-tasks",
    data: {
        loading: false,
        footer: "Este panel se renderiza con CSR ;)",
        tasks: []
    },
    methods: {
        saludar: function(id) {
            alert("hola: " + id);
        }
    }
});

// asigno event listener al boton de refresh
document.querySelector('#btn-refresh').addEventListener('click', cargar);
*/
// carga inicial de las tareas
cargar();

function cargar() {
    app.loading = true;
    fetch('api/comments/1')
        .then(response => response.json())
        .then(comments => {
           // asigno las tareas que me devuelve la API
           app.comments = comments; // es como el $this->smarty->assign("tasks", tareas);
           app.loading = false;
        });
}
