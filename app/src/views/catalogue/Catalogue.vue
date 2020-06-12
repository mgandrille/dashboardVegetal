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
							<h1>{{ plants }}</h1>
                    </div>

					<div class="title row mt-5 p-3">
						<div class="col-lg-12 d-flex flex-wrap justify-content-center">
							<!-- faire un v-for -->
                            <PlantCard />
							<PlantCard />
							<PlantCard />
							<PlantCard />
							<PlantCard />
							<PlantCard />
							<PlantCard />
							<PlantCard />
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
		this.$http.get('http://localhost:8888/plantes.json')
			.then((result) => {
				this.plants = result.data;
			})
	}
};
</script>


