<template>
  <section class="container mt-4">
    <div class="row">
      <div class="col-6 border-right">
        <panel-ingreso @guardado="guardarEnLista" />
      </div>
      <div class="col-6" style="max-height: 25rem; overflow-y: auto;">
        <lista-tarea :lista="lista" class="mx-3" v-on:itemEliminado="eliminarEnLista"></lista-tarea>
      </div>
    </div>
  </section>
</template>

<script>
import panelIngreso from "./components/panelIngreso.vue";
import listaTarea from "./components/listaTarea.vue";
import $ from 'jquery';
import axios from 'axios';
export default {
  data: function() {
    return {
      contador: 1,
      lista: []
    };
  },

  created: function() {
    let self = this;
    axios
      .get("../backend/api/obtenerTareas.php")
      .then(function(respuesta) {
        self.lista = respuesta.data;
        self.contador = respuesta.data.length + 1;
      })
      .catch(function(error) {
        console.log(error);
      });
  },

  methods: {
    guardarEnLista: function(datos) {

      const ajax = $.ajax({
        url: '../backend/api/nuevaTarea.php',
        type: 'POST',
        data: datos,
      });

      ajax.done(function(respuesta){
        console.log(respuesta);
      })

      /*console.log(datos);
      axios.post("../backend/api/nuevaTarea.php", {
        datos: datos
      }).then(function(respuesta){
          console.log(respuesta);
        }).catch(function(error) {
        console.log(error);
      });*/
      
      datos.idTareas = this.contador;
      this.lista.push(datos);
      this.contador = this.contador + 1;
      console.log(this.contador);
    },
    eliminarEnLista: function(id) {
      this.lista = this.lista.filter(elemento => {
        return elemento.idTareas != id;
      });

      const ajax = $.ajax({
        url: '../backend/api/eliminarTarea.php?idTarea=' + id,
        type: 'PUT'
      });

      ajax.done(function(respuesta){
        console.log(respuesta);
      })
    }
  },
  name: "App",
  components: {
    panelIngreso,
    listaTarea
  }
};
</script>

<style>
</style>
