<template>
	<li class="row rounded p-2 align-items-center" style="background-color: #333333">
		<div class="col-8 text-center text-light text-break">
			{{tarea.tarea}}
		</div>
		<div class="col-4 text-right">
			<button type="button" class="btn btn-danger" v-on:click="this.eliminar">X</button>
		</div>
	</li>

</template>

<script>
export default {
	props: ['tarea'],
	methods: {
		eliminar: function(){
			this.$emit('itemEliminado', this.tarea.id);
		}
	}
}
</script>

<style>

</style>