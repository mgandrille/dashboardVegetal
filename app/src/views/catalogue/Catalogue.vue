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
                        <BarreRecherche />
                    </div>

                    <div
                        class="loader row justify-content-center align-items-center"
                        v-if="loading"
                        style="height: 50%"
                    >
                        <svg
                            class="col-12"
                            viewBox="0 0 100 100"
                            xmlns="http://www.w3.org/2000/svg"
                            width="128px"
                            height="128px"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            style="width:auto;height:25%;animation-play-state:start"
                        >
                            <g
                                class="ldl-scale"
                                style="transform-origin:50% 50% 0px;transform:rotate(0deg) scale(0.8);animation-play-state:start"
                            >
                                <g style="animation-play-state:start">
                                    <path
                                        stroke-miterlimit="10"
                                        stroke-linecap="round"
                                        stroke-width="3.5"
                                        stroke="#333"
                                        fill="none"
                                        d="M35.5 72.6c1.8-20 13.7-38.7 31.1-48.8"
                                        style="stroke:rgb(51, 51, 51);animation-play-state:start"
                                    />
                                    <path
                                        stroke-miterlimit="10"
                                        stroke-width="3.5"
                                        stroke="#333"
                                        fill="#abbd81"
                                        d="M71.4 34.8c-8.7 2.5-17.5-2.1-19-6.8S56.3 14.7 65 12.3s25 5.3 25 5.3-9.8 14.7-18.6 17.2z"
                                        style="stroke:rgb(51, 51, 51);fill:rgb(171, 189, 129);animation-play-state:start"
                                    />
                                </g>
                                <g style="animation-play-state:start">
                                    <path
                                        stroke-miterlimit="10"
                                        stroke-linecap="round"
                                        stroke-width="3.5"
                                        stroke="#333"
                                        fill="none"
                                        d="M43 48.2c1.7-4.7.3-9.2-1.7-13.3-1.9-4.1-5.2-7.5-9.2-9.6"
                                        style="stroke:rgb(51, 51, 51);animation-play-state:start"
                                    />
                                    <path
                                        stroke-miterlimit="10"
                                        stroke-width="3.5"
                                        stroke="#333"
                                        fill="#abbd81"
                                        d="M33.5 12.2c4.6 3.5 5 10.5 2.7 13.6s-9.3 4.4-13.9.9-5.7-16.2-5.7-16.2 12.3-1.8 16.9 1.7z"
                                        style="stroke:rgb(51, 51, 51);fill:rgb(171, 189, 129);animation-play-state:start"
                                    />
                                </g>
                                <path
                                    stroke-miterlimit="10"
                                    stroke-width="3.5"
                                    stroke="#333"
                                    fill="#66503a"
                                    d="M73.8 78.6c0-2.1-.9-4.1-2.3-5.5-1.8-2.1-4.4-3.4-7.4-3.4h-.5c-1.7-5.8-7-10-13.3-10-1.7 0-3.3.3-4.8.9-2.3-4.5-6.9-7.6-12.2-7.6-7.6 0-13.7 6.1-13.7 13.7 0 1.5.2 2.9.7 4.2h-.4-.1-.1c-5.2 0-9.5 4.3-9.5 9.5v.2c0 5.1 4.1 9.3 9.3 9.3h43.2c2.9 0 5.6-.8 7.8-2.7 2.2-2 3.5-4.9 3.5-7.8V79c-.2-.2-.2-.3-.2-.4z"
                                    style="stroke:rgb(51, 51, 51);fill:rgb(102, 80, 58);animation-play-state:start"
                                />
                                <metadata
                                    xmlns:d="https://loading.io/stock/"
                                    style="animation-play-state:paused"
                                >
                                    <d:name style="animation-play-state:start">leaf</d:name>

                                    <d:tags
                                        style="animation-play-state:start"
                                    >leaf,plant,leaves,tree,bud,burgreen,shoot,sprout,stem,grow,newbie,tender</d:tags>

                                    <d:license style="animation-play-state:start">by</d:license>

                                    <d:slug style="animation-play-state:start">k3swyk</d:slug>
                                </metadata>
                            </g>
                        </svg>
                    </div>

                    <div class="title row mt-5 p-3" v-if="plants.length">
                        <div class="col-lg-12 d-flex flex-wrap justify-content-center">
                            <PlantCard
                                v-for="(plant, index) in displayedPlants"
                                :key="index"
								:plant="plant"
                                :userLogged="userLogged"
                                :userPlantes="userLogged.dashboard.plantes"
                            >
                            </PlantCard>
                        </div>
                    </div>

                    <div
                        class="title row mt-5 p-3"
                        v-else-if="searchParams.length && !plants.length"
                    >{{ errorMsg }}</div>


                    <!-- ***
                    Pagination
                    ***-->
                    <div class="row col-12 justify-content-end" v-scroll-to="'#top-page'" v-if="plants.length">
                        <div class="clearfix btn-group " >
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
            searchParams: {},
            page: 1,
            perPage: 10,
            pages: [],
            loading: false,
            errorMsg: "plante non trouvée",
            userLogged: []
        };
    },

    methods: {
        getPlants() {
            this.loading = true;

            this.$http
                .get("api/plantes")
                .then(result => {
                    this.plants = result.data;
                })
                .finally(() => {
                    this.loading = false;
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
                        "&name=null"
                )
                .then(result => {
                    this.plants = result.data;
                }).then(() => {
                    this.searchParams.filter = false;
                })
                .catch(() => {
                    this.plants = [];
                    this.searchParams.filter = false;
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
            if (this.searchParams != "") {
                if (this.searchParams.filter === true) {
                    this.getFiltredPlants();
                }
            }

            return this.paginate(this.plants);
        }
    },

    watch: {
        plants() {
            this.setPages();
        },

        searchParams() {
            this.searchParams;
        }
    },

    created() {
        this.getPlants();

        this.$http.get('api/user')
            .then((result) => {
                this.$store.state.userLogged = result.data
        })
            .then(() => {
                // Si l'utilisateur n'est pas connecté, retourne un tableau vide donc userLogged est NULL
                if(this.$store.state.userLogged.length < 1) {
                    this.userLogged = null;
                }
                // Si l'utilisateur est connecté, retourne un objet qui est inséré dans userLogged
                else {
                    this.userLogged = this.$store.state.userLogged;
                    console.log(this.userLogged);
                }
            });
        }

};
</script>


