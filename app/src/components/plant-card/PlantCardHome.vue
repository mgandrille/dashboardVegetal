<template>
<router-link :to="{ path: `/dashboard/${dashboard.id}` }" tag="div">
	<div
		:class="classes"
        @mouseover="hoverOver"
        @mouseout="hoverOut"
	 	class="animCard card m-2 col-12 col-md-auto" style="width: 18rem;">
		<div class="card-header d-flex align-items-baseline">
			<p>Dashboard</p>
			<div class="separator d-flex align-items-baseline"><div class="align-self-baseline"></div></div>
		</div>
		<div class="radius d-flex flex-md-column">
			<img src="http://localhost:8888/uploads/pictures/telechargement-5ee1f2ef436f5.jpeg" class="card-img-top p-3" alt="image">
			<div class="d-flex flex-column card-body">
				<h5 class="card-title">Créé par : {{ dashboard.user.username }}</h5>
				<p class="card-text">{{ dashboard.plantes.length }} plantes ajoutées</p>
			</div>
		</div>
	</div>
	</router-link>
</template>

<script>
export default {
	name: 'PlantCardHome',
	props: ['dashboard'],

	data(){
	return {
		classes: [],
		};
	},

	methods: {
		hoverOver(){
			this.classes.push('animated')
		},
		hoverOut(){
			this.classes = []
		}
	}
};


</script>

<style scoped lang="scss" src="./plant-card.scss">
</style>