<template>
    <div class="detail">
        <div class="container-fluid">
            <div class="row">
                <!-- left-side banner mettre le style en dynamique-->
                <div class="banner col-lg-7 position-fixed"></div>

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

            <footer class="row footer-detail position-fixed fixed-bottom">
                <div class="col-12">
                    <ul class="text-light">
                        <li>Arrosage : {{ plant.watering }}</li>
                        <li>Ensoleillement : {{ plant.sunshine.exposure }}</li>
                        <li>Boutage : {{ plant.cuttings }}</li>
                        <li>Rempotage : {{ plant.pottings }}</li>
                        <li>Taille : {{ plant.carves }}</li>
                    </ul>
                </div>
            </footer>
        </div>
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


