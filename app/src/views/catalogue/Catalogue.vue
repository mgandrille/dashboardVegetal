<template>
    <div class="home">
        <div class="container-fluid">
            <div class="row">
                <!-- left-side banner -->
                <div class="filtrage col-lg-2">
                    <Filtrage v-on:get-params="searchParams = $event" />
                </div>

                <!-- main content -->
                <main
                    id="top-page"
                    class="main-content col-lg-10 offset-lg-2 container-lg bg-light p-3"
                >
                    <div class="searchbar row p-3 justify-content-center">
                        <BarreRecherche v-on:get-name-param="searchbarParams = $event" />
                    </div>

                    <div
                        class="loader row justify-content-center align-items-center"
                        v-if="loading"
                        style="height: 50%"
                    >
                        <img src="https://i.postimg.cc/ht7yvwLc/leaf-1-1s-128px.png" alt="">
                    </div>

                    <div class="title row mt-5 p-3" v-if="userLogged.username && plantLenght > 0">
                        <div class="col-lg-12 d-flex flex-wrap justify-content-center">
                            <PlantCard
                                v-for="(plant, index) in displayedPlants"
                                :key="index"
                                :plant="plant"
                                :userLogged="userLogged"
                                :userPlantes="userLogged.dashboard.plantes"
                            ></PlantCard>
                        </div>
                    </div>
                    <div class="title row mt-5 p-3" v-else>
                        <div class="col-lg-12 d-flex flex-wrap justify-content-center">
                            <PlantCard
                                v-for="(plant, index) in displayedPlants"
                                :key="index"
                                :plant="plant"
                            ></PlantCard>
                        </div>
                    </div>

                    <div v-if="notFind"
                        class="title row mt-5 p-3"
                        
                    >Oupsy !</div>

                    <!-- ***
                    Pagination
                    ***-->
                    <div
                        class="row col-12 justify-content-end"
                        v-scroll-to="'#top-page'"
                        v-if="plants.length"
                    >
                        <div class="clearfix btn-group">
                            <button
                                type="button"
                                class="btn btn-primary"
                                v-if="page != 1"
                                @click="page--"
                            >précédent</button>
                            <button
                                type="button"
                                :class="{active: isActive(pageNumber) }"
                                class="btn btn-primary"
                                v-for="(pageNumber, index) in pages.slice(page-1, page+5)"
                                :key="index"
                                @click="page = pageNumber"
                            >{{pageNumber}}</button>
                            <button
                                type="button"
                                @click="page++"
                                v-if="page < pages.length"
                                class="btn btn-primary"
                            >suivant</button>
                        </div>
                    </div>
                </main>
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
            searchParams: {
                type: "null",
                water: "null",
                sunshine: "null",
                difficulty: "null",
                filter: false
            },
            searchbarParams: {
                name: "null",
                filter: false
            },
            page: 1,
            perPage: 10,
            pages: [],
            loading: false,
            notFind: false,
            userLogged: []
        };
    },

    methods: {
        getPlants() {
            this.$http.get("api/plantes").then(result => {
                this.plants = result.data;
            });
        },

        

        getFiltredPlants() {
            this.loading = true;

            this.$http
                .get(
                    "api/plantes/search?type=" +
                        this.searchParams.type +
                        "&watering=" +
                        this.searchParams.water +
                        "&sunshine=" +
                        this.searchParams.sunshine +
                        "&difficulty=" +
                        this.searchParams.difficulty +
                        "&name=" +
                        this.searchbarParams.name
                )
                .then(result => {
                    if(Object.keys(result.data).length > 0) {
                        this.plants = result.data;
                    } else {
                        this.notFind = true;
                        this.plants = [];
                    }
                })
                .then(() => {
                    this.paginate(this.plants);
                    this.searchParams.filter = false;
                    this.searchbarParams.filter = false;
                })
                .then(() => {
                    this.searchParams.filter = false;
                    this.searchbarParams.filter = false;
                })
                .catch(() => {
                    this.plants = [];
                    this.searchParams.filter = false;
                    this.searchbarParams.filter = false;
                })
                .finally(() => {
                    this.loading = false;
                });
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
        },

        isActive(nb) {
            if (this.page === nb) {
                return true;
            } else {
                return false;
            }
        }
    },

    computed: {
        displayedPlants() {
            if (
                this.searchParams.filter === true ||
                this.searchbarParams.filter === true
            ) {
                this.pages = [];
                this.getFiltredPlants();
            } else {
                return this.paginate(this.plants);
            }
        },

       
    },

    watch: {
        plants() {
            this.setPages();
        },

        searchParams() {
            this.searchParams;
        },

        searchbarParams() {
            this.searchbarParams;
        }
    },

    created() {
        this.$http
            .get("api/plantes")
            .then(result => {
                this.plants = result.data;
            })
            .then(() => {
                this.$http.get("api/user").then(result => {
                    this.userLogged = result.data;
                });
            });
    }
};
</script>


