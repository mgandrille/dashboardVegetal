<template>
    <div class="home container-fluid">
        <main class="main-content row bg-light p-3">
            <div class="col-12 mt-3"  v-if="userLogged != null && userLogged.dashboard.id == $route.params.id">
                <h2>
                    Bonjour
                    <span class="username">{{userLogged.username}}</span>, voici vos plantes : 
                </h2>
                <hr />
            </div>

            <div class="col-lg-9 mt-3">
                <div class="col-12">
                    <h2 class="mb-3">Prochain arrosage</h2>
                    <p>Voici les plantes à entretenir en priorité</p>
                    <div class=" row bg-primary justify-content-center pt-3">
                        <div v-for="plant in plants" :key="plant.id">
                            <div
                                v-if="plant.watering.timeFrequency == 259200"
                            >
                                <p class="arrosage text-light text-center">A arroser dans : 3 jours</p>
                                <PlantCard
                                    :plant="plant"
                                    :toArrose="true"
                                >
                                </PlantCard>
                            </div>
                        </div>
                    </div>
                </div>

                <hr />

                <div class="col-12">
                    <h2 class="mb-3">Toutes vos plantes</h2>
                    <p>Un apperçu de toutes les plantes que vous avez</p>

                    <div class="title row mt-5 p-3" v-if="userLogged != null && userLogged.dashboard.id == $route.params.id">
                        <div class="col-lg-12 d-flex flex-wrap justify-content-center">
                            <PlantCard
                                v-for="(plant, index) in plants"
                                :key="index"
								:plant="plant"
                                :inDashboard="inDashboard"
                                :dashboard="userLogged"
                                :userLogged="userLogged"
                            >
                            </PlantCard>
                        </div>
                    </div>

                    <div class="title row mt-5 p-3" v-else>
                        <div class="col-lg-12 d-flex flex-wrap justify-content-center">
                            <PlantCard
                                v-for="(plant, index) in plants"
                                :key="index"
								:plant="plant"
                                :inDashboard="inDashboard"
                            >
                            </PlantCard>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-3 mt-3">
                <h2 class="mb-3">Vos widgets</h2>
                <Meteo />
            </div>
        </main>
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
            plants: [],
            userLogged: [],
            inDashboard: false,
        };
    },

    created() {
        this.$http
            .get("api/user")
            .then(result => {
                if(Object.keys(result.data).length) {
                    this.userLogged = result.data;
                } else {
                    this.userLogged = null;
                }

            })
            .then(() => {
                if(this.userLogged != null && this.userLogged.dashboard.id == this.$route.params.id) {
                    this.plants = this.userLogged.dashboard.plantes;
                    this.inDashboard = true;
                } else {
                    this.$http.get('api/dashboards').then((result) => {
                        let dashboardPlants = result.data;

                        dashboardPlants.forEach(dash => {
                            if (dash.id == this.$route.params.id) {
                                return this.plants = dash.plantes
                            }
                        })
                    })
                }

            });

    }
        

};
</script>


