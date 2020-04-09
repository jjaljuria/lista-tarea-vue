<template>
  <ul>
	<item v-for="(i, indice) in lista" :key="indice" :tarea="i"  @itemEliminado="itemEliminado"/>
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