<template>
   <div class="home">
        <div class="container-fluid">
            <div class="row">
                <!-- left-side banner -->
                <div class="filtrage col-lg-2 position-fixed">
					filtrage
				</div>

                <!-- main content -->
                <main class="main-content col-lg-10 offset-lg-2 container-lg bg-light">
                    
                    <div class="searchbar row p-3 justify-content-center">
                            <BarreRecherche />
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


<style scoped lang="scss"></style>

<script>
import PlantCard from '../../components/plant-card/PlantCard.vue';

export default {
	name: 'Dashboard',
	components: {
		PlantCard
	}
};
</script>


