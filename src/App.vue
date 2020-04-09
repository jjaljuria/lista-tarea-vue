<template>
  <section class="container mt-4">
    <div class="row">
      <div class="col-6 border-right">
        <panel-ingreso @guardado="guardarEnLista"/>
      </div>
      <div class="col-6" style="max-height: 25rem; overflow-y: auto;">
        <lista-tarea :lista="lista" class="mx-3" v-on:itemEliminado="eliminarEnLista"></lista-tarea>
      </div>
    </div>
  </section>
</template>

<script>
import panelIngreso from './components/panelIngreso.vue'
import listaTarea from './components/listaTarea.vue'
export default {
  data: function(){
    return {
      contador: 1,
      lista: []
    };
  },

  methods: {
    guardarEnLista: function(datos){

      datos.id=this.contador;
      this.contador++;

      this.lista.push(datos);
    },
    eliminarEnLista: function(id){
      this.lista = this.lista.filter((elemento) => {
        return elemento.id != id;
      });
    }
  },
  name: 'App',
  components: {
    panelIngreso,
    listaTarea
  }
}
</script>

<style>

</style>
