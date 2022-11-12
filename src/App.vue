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

function randomId(){
  const now = new Date();
  const randomInt = Math.floor(Math.random() * (1000000 - 1) + 1);
  return String(now.getMilliseconds()) + '-' + String(randomInt)
}


export default {
  data: function() {
    return {
      lista: []
    };
  },

  created: function() {
    this.lista = JSON.parse(localStorage.getItem('lista-tarea-vue-data'))
  },

  methods: {
    guardarEnLista: function(datos) {
      
      datos.idTareas = randomId();
      this.lista.push(datos);
      localStorage.setItem('lista-tarea-vue-data', JSON.stringify(this.lista))
    },
    eliminarEnLista: function(id) {
      this.lista = this.lista.filter(elemento => {
        return elemento.idTareas != id;
      });

      localStorage.setItem('lista-tarea-vue-data', JSON.stringify(this.lista))
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
