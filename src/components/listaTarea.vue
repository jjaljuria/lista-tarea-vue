<template>
  <ul class="list-group list-group-flush mx-2">
	<li class="list-group-item">
		<div class="row text-center font-weight-bold">
			<div class="col-4">
				Nombre
			</div>
			<div class="col-4">
				Fecha de Inicio
			</div>
		</div>
	</li>
	<item v-for="i in lista" :key="i.idTareas" :tarea="i"  @itemEliminado="itemEliminado"/>
  </ul>
</template>

<script>
import item from './item.vue'
export default {
	components:{
		item
	},
	props : ['lista'],

	methods:{
		itemEliminado: function(evento){
			this.$emit('itemEliminado', evento);
		}
	}
}
</script>

<style>
	
</style>