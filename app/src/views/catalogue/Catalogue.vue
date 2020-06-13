<template>
    <div class="home">
        <div class="container-fluid">
            <div class="row">
                <!-- left-side banner -->
                <div class="filtrage col-lg-2 position-fixed">
                    <Filtrage v-on:get-params="searchParams = $event" />
                </div>

                <!-- main content -->
                <main
                id="top-page"
                    class="main-content col-lg-10 offset-lg-2 container-lg bg-light"
                >
                    <div class="searchbar row p-3 justify-content-center">
                        <BarreRecherche />
                    </div>

                    <div class="title row mt-5 p-3">
                        <div class="col-lg-12 d-flex flex-wrap justify-content-center">
                            <div class="loader" v-if="loading">Loading </div>
                            <PlantCard
                                v-for="(plant, index) in displayedPlants"
                                :key="index"
                                :plantItem="plant"
                            >
                                <template v-slot:plant-name>
                                    <h5 class="card-title">{{ plant.name }}</h5>
                                </template>
                                <template v-slot:plant-description>
                                    <p class="card-text">{{ plant.description.substring(0, 255) }}</p>
                                </template>
                            </PlantCard>
                        </div>
                    </div>
                </main>
                <div class="clearfix btn-group col-md-2 offset-md-5">
                    <button
                        type="button"
                        class="btn btn-primary"
                        v-if="page != 1"
                        @click="page--"
                    >previous</button>
                    <button
                        type="button"
                        class="btn btn-primary"
                        v-for="(pageNumber, index) in pages.slice(page-1, page+5)"
                        :key="index"
                        @click="page = pageNumber"
                    >{{pageNumber}}</button>
                    <button
                        to="'#top-page'"
                        type="button"
                        @click="page++"
                        v-scroll-to="'#top-page'"
                        v-if="page < pages.length"
                        class="btn btn-primary"
                    >next</button>
                </div>
            </div>
        </div>
    </div>
</template>


<style scoped lang="scss" src="./catalogue.scss"></style>

<script>
import BarreRecherche from "../../components/BarreRecherche.vue";
import PlantCard from "../../components/plant-card/PlantCard.vue";
import Filtrage from "../../components/Filtrage.vue";

export default {
    name: "Catalogue",
    components: {
        BarreRecherche,
        PlantCard,
        Filtrage
    },

    data() {
        return {
            plants: [],
            searchParams: "",
            page: 1,
            perPage: 10,
            pages: [],
            loading: false
        };
    },

    methods: {
        getPlants() {
            this.loading = true;
            this.$http.get("api/plantes")
            .then(result => {
                this.plants = result.data;
            })
            .finally(() => {
                this.loading = false;
            })
        },

        setPages() {
            let nbPages = Math.ceil(this.plants.length / this.perPage);
            for (let i = 1; i <= nbPages; i++) {
                this.pages.push(i);
            }
        },

        paginate(plants) {
            let page = this.page;
            let perPage = this.perPage;
            let from = page * perPage - perPage;
            let to = page * perPage;

            return plants.slice(from, to);
        }
    },

    computed: {
        displayedPlants() {
            return this.paginate(this.plants);
        }
    },

    watch: {
        plants() {
            this.setPages();
        }
    },

    created() {
        this.getPlants();
    }
};
</script>


