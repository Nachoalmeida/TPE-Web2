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
          id_usuario_fk: document.querySelector("input[name=id_usuario_fk]")
            .value,
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
    score: 0,
    total: 0,
    index: 0,
    average: 0,
    comments: [],
  },
});

function scoreComment() {
  app_score.average = 0;
  app_score.score = 0;
  app_score.index = 0;
  app_score.total = 0;
  app_score.comments.forEach(average);
  app_score.average = app_score.total / app_score.index;
  app_score.average = app_score.average.toFixed(1);
}

function average(item, index) {
  app_score.score = +item.puntaje;
  app_score.index = index + 1;
  app_score.total = app_score.score + app_score.total;
}
