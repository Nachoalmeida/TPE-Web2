"use strict"

// paso el ID del auto (publicacion) en el que vamos a comentar
let id_auto = document.querySelector("input[id=idCar]").value;


loadComments();


function loadComments() {

    

    fetch('api/cars/'+id_auto+'/comments')

        .then(function(r){
            if(!r.ok){
                console.log("error")
            }
                return r.json()

            
        })
        .then(comments => {
           console.log(document.querySelector("input[name=admin]").value);
           app.comments = comments; // es como el $this->smarty->assign("tasks", tareas);
        });
}

// definimos la app Vue
let app = new Vue({
    el: "#app-comments",
    data: {
        admin: document.querySelector("input[name=admin]").value,
        comments: [],     
    },
    methods: {
        deleteComment: function (id_comentario){
            fetch('api/comments/'+id_comentario, {
                method:'DELETE'
            })
            .then(()=> {
                loadComments()
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
        user: document.querySelector("input[name=logueo]").value,
        mensaje: "",
        puntaje: "",
        alert: 0
    },
    methods: {
        addComment: function () {
            this.alert= 0;
            if(this.mensaje == "" || this.puntaje == ""){
                this.alert= 1;
            }
            else
            {
                let data = {
                    mensaje: this.mensaje,
                    puntaje: this.puntaje,
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
                    loadComments();
                    this.mensaje="";
                    this.puntaje="";
                })
                .catch(error => console.log(error));
            } 
        }

    },
})





