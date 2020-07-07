"use strict";

// paso el ID del auto (publicacion) en el que vamos a comentar
let id_car = document.querySelector("input[id=idCar]").value;

loadComments();

setInterval(function () {
  loadComments();
}, 5000);

function loadComments() {
  fetch("api/cars/" + id_car + "/comments")
    .then(function (r) {
      if (!r.ok) {
        console.log("error");
      }
      return r.json();
    })
    .then((comments) => {
      app.comments = comments; // es como el $this->smarty->assign("tasks", tareas);
      app_score.comments = comments;
      if (app_score.comments) {
        scoreComment();
      }
    })
    .catch((error) => console.log(error));
}

// definimos la app Vue
let app = new Vue({
  el: "#app-comments",
  data: {
    admin: document.querySelector("input[name=admin]").value,
    comments: [],
  },
  methods: {
    deleteComment: function (id_comentario) {
      fetch("api/comments/" + id_comentario, {
        method: "DELETE",
      })
        .then(() => {
          loadComments();
        })
        .catch((error) => console.log(error));
    },
  },
});

let app_form = new Vue({
  el: "#app-form-comments",
  data: {
    user: document.querySelector("input[name=logueo]").value,
    mensaje: "",
    puntaje: "",
    alert: 0,
  },
  methods: {
    addComment: function () {
      this.alert = 0;
      if (this.mensaje == "" || this.puntaje == "") {
        this.alert = 1;
      } else {
        let data = {
          mensaje: this.mensaje,
          puntaje: this.puntaje,
          id_usuario_fk: document.querySelector("input[name=id_usuario_fk]").value,
          id_auto_fk: document.querySelector("input[name=id_auto]").value,
        };
        fetch("api/cars/" + id_car + "/comments", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify(data),
        })
          .then(() => {
            loadComments();
            this.mensaje = "";
            this.puntaje = "";
          })
          .catch((error) => console.log(error));
      }
    },
  },
});

let app_score = new Vue({
  el: "#app-score",
  data: {
    average: 0,
    comments: [],
  },
});

function scoreComment(){
  let index=0;
  let score= 0;
  let total=0;
  app_score.average= 0;
  app_score.comments.forEach(comment => { 
    index++;   
    score= +comment.puntaje;
    total= score + total;   
  });
  app_score.average = total / index;
  app_score.average = app_score.average.toFixed(1);
}
