"use strict"

// paso el ID del auto (publicacion) en el que vamos a comentar
let id_auto = document.querySelector("input[id=idCar]").value;
let logueo = document.querySelector("input[name=logueo]").value;
let admin = document.querySelector("input[name=admin]").value;



// carga inicial de las tareas
cargarFomulario();



function cargarComentarios() {

    //app.loading = true;
    fetch('api/cars/'+id_auto+'/comments')

        .then(function(r){
            if(!r.ok){
                console.log("error")
            }
                return r.json()

            
        })
        .then(comments => {
            if(admin == "1"){
                app.admin = 1;
            }
           app.comments = comments; // es como el $this->smarty->assign("tasks", tareas);
           //app.loading = false;
        });
}

// definimos la app Vue
//Para el admin muestra el boton eliminar
let app = new Vue({
    el: "#app-comments",
    data: {
        comments: [],
        promedio: 0,
        admin: 0,
        
        
    },
    methods: {
        deleteComment: function (id_comentario){
            fetch('api/comments/'+id_comentario, {
                method:'DELETE'
            })
            .then(()=> {
                cargarComentarios()
            })
            .catch(error=>console.log(error))
        }
    }
});

// App Vue para mostrar form para agregar comentario
// Lo mustra si es un usuario registrado
// El botón ejecuta la función addComment




let app_form = new Vue({
    el: "#app-form-comments",
    data: {
        logueo: false   
    },
    methods: {
        addComment: function () {
            
            if(document.querySelector("select[name=puntaje]").value == 0
                || document.querySelector("textarea[name=mensaje]").value == ""){
                alert("Faltan datos");
            }
            else
            {
                let data = {
                    mensaje: document.querySelector("textarea[name=mensaje]").value,
                    puntaje: document.querySelector("select[name=puntaje]").value,
                    id_usuario_fk: document.querySelector("input[name=id_usuario_fk]").value,
                    id_auto_fk: document.querySelector("input[name=id_auto]").value
                }
                console.log(data);
                fetch('api/cars/'+id_auto+'/comments', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify(data)
                })
                .then(() => {
                    cargarComentarios();
                })
                .catch(error => console.log(error));
            } 
        }

    }
})

function cargarFomulario(){

    if(logueo == true){
        app_form.logueo = true;
    }
    cargarComentarios();

}




