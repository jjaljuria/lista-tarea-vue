<template>
	<form action="" method="get">
		<div class="form-group">
			<label for="tarea">Tarea: </label>
			<input type="text" class="form-control" id="tarea" maxlength="50" v-model="tarea">
		</div>
		<div class="form-group">
			<label for="fechaIn">Fecha de inicio: </label>
			<input type="date" class="form-control" id="fechaIn" v-model="fecha">
		</div>
		<button class="btn btn-primary" type="button" v-on:click="guardar">Guardar</button>
	</form>
</template>

<script>
import moment from 'moment/moment'
export default {
	data:function(){
		return {
			tarea: '',
			fecha: moment().format('YYYY-MM-DD')
		}
	},
	methods:{
		guardar: function(){
			if(this.tarea == ''){
				alert('debe tener colocar una tarea');
			}else{
				this.$emit('guardado', {tarea: this.tarea, fecha: this.fecha, id: this.id + 1})
				this.tarea = '';
				this.fecha = moment().format('YYYY-MM-DD');
			}
		}
	}

}
</script>

<style>

</style>