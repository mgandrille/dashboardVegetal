<template>
	<div class="card m-2 col-12 col-md-auto" style="width: 18rem;">
		<div class="card-header d-flex align-items-baseline">
			<p>Dashboard</p>
			<div class="separator d-flex align-items-baseline"><div class="align-self-baseline"></div></div>
		</div>
		<div class="d-flex flex-md-column">
			<img src="http://localhost:8888/uploads/pictures/telechargement-5ee1f2ef436f5.jpeg" class="card-img-top p-3" alt="image">
			<div class="d-flex flex-column card-body">
				<h5 class="card-title">Créé par : {{ dashboard.id }}</h5>
				<p class="card-text">{{ dashboard.plantes.length }} plantes ajoutées</p>
				<router-link :to="{ path: `/dashboard/${dashboard.id}` }" class="btn btn-primary ml-auto">Voir</router-link>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: 'PlantCardHome',
	props: ['dashboard']
}
</script>

<style scoped lang="scss" src="./plant-card.scss"></style>