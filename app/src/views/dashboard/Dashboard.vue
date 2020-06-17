<template>
    <div class="home container-fluid">
        <main class="main-content row bg-light p-3">
            <div class="col-12 mt-3">
                <h2>
                    Bonjour
                    <span class="username">{{userLogged.username}}</span>, voici vos plantes : {{$route.params.id}}
                </h2>
                <hr />
            </div>

            <div class="col-lg-9 mt-3">
                <div class="col-12">
                    <h2 class="mb-3">Prochain arrosage</h2>
                    <p>Voici les plantes à entretenir en priorité</p>
                    <div class="row bg-primary justify-content-center">
                        <ul>
                            <li
                                class="text-light"
                                v-for="plant in plants"
                                :key="plant.id"
                                v-bind:class="{ arrosage: plant.isArrosed }"
                            >
                                {{plant.name}} : {{ plant.watering.id }} / {{plant.watering.timeFrequency}}
                                <!-- {{ plant }} -->
                            </li>
                        </ul>
                    </div>
                </div>

                <hr />

                <div class="col-12">
                    <h2 class="mb-3">Toutes vos plantes</h2>
                    <p>Un apperçu de toutes les plantes que vous avez</p>

                    <div class="title row mt-5 p-3" v-if="plants.length && userLogged.length > 0">
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

                    <div class="title row mt-5 p-3" v-else-if="plants.length">
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
            inDashboard: true,
        };
    },

    created() {
        this.$http
            .get("api/user")
            .then(result => {
                this.userLogged = result.data;
            })
            .then(() => {
                let currentDashboard = this.$route.params.id;

                if(this.userLogged.length > 0 && this.userLogged.dashboard.id === currentDashboard) {
                    this.plants = this.userLogged.dashboard.plantes;
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

                
                this.inDashboard = true;

                this.plants.forEach(plant => {
                    let dateArrosage =
                        plant.arroseds.convertTimestamp +
                        plant.watering.timeFrequency;
                        
                    console.log('date arrosage : ' + dateArrosage);

                    let date = Date.now();
                    console.log('aujourdhui : ' + date);

                    if (dateArrosage >= date) {
                        return (plant.isArrosed = true);
                        this.$http.get("/arrosed/isArrosed/" + this.dashboard.id + "/" + this.plant.id)
                    }
                });

            });

    }
        

};
</script>


