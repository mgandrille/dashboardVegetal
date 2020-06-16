<template>
    <div class="home container-fluid">
        <main class="main-content row bg-light p-3">
            <div class="col-12 mt-3">
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
                    <div class="row flex-wrap col-lg-12 mb-3">
                        <PlantCard />
                        <PlantCard />
                        <PlantCard />
                        <PlantCard />
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
            userLogged: []
        };
    },

    created() {
        this.$http
            .get("api/user")
            .then(result => {
                this.$store.state.userLogged = result.data;
            })
            .then(() => {
                this.userLogged = this.$store.state.userLogged;
                this.plants =  this.userLogged.dashboard
            });
            // .then(() => {

            //         this.plants.forEach(plant => {
            //             let dateArrosage =
            //                 plant.watering.DERNIERARROSAGE +
            //                 plant.watering.timeFrequency;
            //             let date = Date.now();
            //             console.log(date);
            //             if (dateArrosage >= date) {
            //                 return (plant.isArrosed = true);
            //             }
            //         });
            //     });
            // });
    }
};
</script>


