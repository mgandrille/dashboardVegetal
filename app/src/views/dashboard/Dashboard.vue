<template>
    <div class="home">
        <div class="container-fluid">
            <div class="row">
                <!-- left-side filter -->
                <div class="filtrage col-lg-2 position-fixed">
                    <Filtrage/>
                </div>

                <!-- main content -->
                <main class="main-content row col-lg-10 offset-lg-2 container-lg bg-light col-12">
                    <div class="col-lg-9">
                        <h2 class="mb-3">Prochain arrosage</h2>
                        <div class="row bg-primary justify-content-center">
                            <ul>
                                <li class="text-light" v-for="items in apiResponse" :key="items.id" v-bind:class="{ arrosage: items.isArrosed }">
                                    {{items.name}} : {{items.watering}}
                                </li>
                            </ul>
                        </div>

                        <div class="row">
                            <h2 class="mb-3">Toutes vos plantes</h2>

                            <div class="row flex-wrap col-lg-12 mb-3">
                                <PlantCard />
                                <PlantCard />
								<PlantCard />
								<PlantCard />
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
						<h2 class="mb-3">Vos widgets</h2>
						<Meteo />
					</div>
                </main>
            </div>
        </div>
    </div>
</template>


<style scoped lang="scss" src="./dashboard.scss"></style>

<script>
import PlantCard from "../../components/plant-card/PlantCard.vue";
import Meteo from "../../components/Meteo.vue";
import Filtrage from "../../components/Filtrage.vue";

export default {
    name: "Dashboard",
    components: {
		PlantCard,
        Meteo,
        Filtrage
    },
    data() {
        return {
            apiResponse: [
                { id: 1, name: 'plante1', watering: 'fréquent', timeFrequency: 259200, isArrosed: true },
                { id: 2, name: 'plante2', watering: 'occasionnel', timeFrequency: 604800, isArrosed: false  },
                { id: 3, name: 'plante3', watering: 'peu fréquent', timeFrequency: 1814400, isArrosed: false}
            ],

        }
    },


};

</script>


