<template>
    <div class="detail">
        <div class="container-fluid">
            <div class="row">
                <!-- left-side banner mettre le style en dynamique-->
                <div class="banner col-lg-7"></div>

                <!-- main content -->
                <main class="main-content col-lg-5 offset-lg-7 container-lg bg-light">
                    <div class="title row mt-5 p-3">
                        <div class="col-lg-12">
                            <h2>{{ plant.name }}</h2>
                        </div>
                    </div>

                    <div class="content row p-3">
                        <div class="col-lg-12">
                            <p>{{ plant.description }}</p>
                            <hr />
                            <ul>
                                <li>Difficulté : {{ plant.difficulty }}</li>
                                <li>Espèce : {{ plant.species }}</li>
                                <li>Catégorie : {{ plant.category }}</li>
                                <li>Type : {{ plant.type }}</li>
                                <li>Floraison : {{ plant.flowerings }}</li>
                            </ul>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <footer class="footer-detail px-3 pt-3 container-fluid">
            <div class="row informations text-light col-12">
                <div class="col-md-4">
                    <div class="col-md-auto">
                        <h4>
                            Arrosage :
                            <span>{{plante.watering}}</span>
                        </h4>
                    </div>

                    <hr />

                    <div class="col-md-auto">
                        <h4>
                            Ensoleillement :
                            <span>{{plante.sunshine}}</span>
                        </h4>
                    </div>

                    <hr class="d-md-none" />
                </div>

                <div class="col-md-4">
                    <div class="col-md-auto">
                        <h4>
                            Bouturage :
                            <span>{{plante.cutting}}</span>
                        </h4>
                    </div>

                    <hr />

                    <div class="col-md-auto">
                        <h4>
                            Rempotage :
                            <span>{plante.potting}</span>
                        </h4>
                    </div>

                    <hr class="d-md-none" />
                </div>

                <div class="col-md-4">
                    <div class="col-md-auto">
                        <h4>
                            Taille :
                            <span>{{plante.carve}}</span>
                        </h4>
                    </div>

                    <hr />
                </div>
            </div>
        </footer>
    </div>
</template>


<style scoped lang="scss" src="./detail.scss"></style>


<script>
export default {
    name: "Detail",
    data() {
        return {
            plant: []
        };
    },

    methods: {
        getPlant() {
            this.$http
                .get("api/plantes/" + this.$route.params.id)
                .then(result => {
                    this.plant = result.data;
                });
        }
    },

    created() {
        this.getPlant();
    }
};
</script>


