<template>
	<div class="home">
        <div class="container-fluid">
            <div class="row">
                <!-- left-side banner -->
                <div class="filtrage col-lg-2 position-fixed">
					<Filtrage/>
				</div>

                <!-- main content -->
                <main class="main-content col-lg-10 offset-lg-2 container-lg bg-light">
                    
                    <div class="searchbar row p-3 justify-content-center">
                            <BarreRecherche />
                    </div>

					<div class="title row mt-5 p-3">
						<div class="col-lg-12 d-flex flex-wrap justify-content-center">
                            <PlantCard 	v-for="plant in plants" 
										:key="plant.id"
										:plantItem="plant" >
								<template v-slot:plant-name>
									<h5 class="card-title">{{ plant.name }}</h5>
								</template>
								<template v-slot:plant-description>
									<p class="card-text">{{ plant.description }}</p>
								</template>
							</PlantCard>
						</div>
                    </div>

                </main>
            </div>
        </div>
    </div>
</template>


<style scoped lang="scss" src="./catalogue.scss"></style>

<script>
import BarreRecherche from '../../components/BarreRecherche.vue';
import PlantCard from '../../components/plant-card/PlantCard.vue';
import Filtrage from '../../components/Filtrage.vue';

export default {
	name: 'Catalogue',
	components: {
		BarreRecherche,
		PlantCard,
		Filtrage
	},

	data() {
		return {
			plants: []
		}
	},

	created() {
		this.$http.get('api/plantes')
			.then((result) => {
				this.plants = result.data;
			})
	}
};
</script>


