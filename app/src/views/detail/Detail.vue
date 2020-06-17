<template>
    <div class="detail bg-light">
        <div class="container-fluid">
            <div class="row">
                <!-- left-side banner mettre le style en dynamique-->
                <div class="banner col-lg-5 bg-light" v-bind:style="{ backgroundImage: 'url(http://localhost:8888/uploads/pictures/' + plant.picture + ')' }">
                    <button class="btn btn-primary ml-auto" @click.prevent="addPlant()" v-bind:class="{ disabled: disable, 'd-none': inDashboard }" :disabled="disable">Ajouter +</button>

                </div>

                <!-- main content -->
                <main class="main-content col-lg-7 offset-lg-5 container-lg bg-light">
                    <router-link :to="{ path: '/catalogue' }" class="dropdown-item text-secondary text-capitalize" href="#">
                        <i class="fa fa-angle-double-left"></i>
                        retour
                    </router-link>
                    <div class="title row mt-5 p-3">
                        <div class="col-lg-12">
                            <h2 class="text-primary">{{ plant.name }}</h2>
                        </div>
                    </div>

                    <div class="content row pl-0 p-3">
                        <div class="card bg-light border-none col-lg-12 pl-0">
                            <div class="card-header border-primary py-4">
                                {{ plant.description }}
                            </div>
                            <ul class="list-group list-group-flush pt-4">
                                <li class="list-group-item py-3">
                                    <h6>Caractéristiques de la plante :</h6>
                                    <ul class="text-capitalize">
                                        <li>espèce : {{ plant.species }}</li>
                                        <li>catégorie : {{ plant.category.categories }}</li>
                                        <li>type : {{ plant.type.plante_type }}</li>
                                    </ul>
                                </li>
                                <li class="list-group-item py-3">
                                    <h6>Comment s'en occuper :</h6>
                                    <ul class="text-capitalize">
                                        <li>entretien : {{ plant.difficulty.level }}</li>
                                        <li>fréquence d'arrosage : {{ plant.watering.frequency }}</li>
                                        <li>ensoleillement : {{ plant.sunshine.exposure }}</li>
                                    </ul>
                                </li>
                                <li class="list-group-item py-3">
                                    <h6>En fonction des mois de l'année :</h6>
                                    <ul class="text-capitalize">
                                        <li>floraison : <span v-for="(plant, index) in plant.flowerings" :key="index"> - {{ plant.month }} </span> </li>
                                        <li>bouturage : <span v-for="(plant, index) in plant.cuttings" :key="index"> - {{ plant.month }} </span></li>
                                        <li>rempotage : <span v-for="(plant, index) in plant.pottings" :key="index"> - {{ plant.month }} </span></li>
                                        <li>taille : <span v-for="(plant, index) in plant.carves" :key="index"> - {{ plant.month }} </span></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <footer class="footer-detail container-fluid d-none d-lg-block">
            <div class="row informations text-light col-lg-5 px-3 py-5 bg-primary">
                    <div class="col">
                        <h4>Arrosage :</h4>
                        <div class="text-capitalize">{{ plant.watering.frequency }}</div>
                    </div>

                    <div class="col">
                        <h4>Ensoleillement :</h4>
                        <div class="text-capitalize">{{ plant.sunshine.exposure }}</div>
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
            plant: [],
            userLogged: [],
            disable: false,
            inDashboard: false,
        };
    },

    methods: {
        getPlant() {
            this.$http
                .get("api/plantes/" + this.$route.params.id)
                .then(result => {
                    this.plant = result.data;
                });
        },

        addPlant() {
            if (this.userLogged != undefined && this.userLogged.dashboard.plantes != undefined) {
                this.$http
                    .get(
                        "dashboard/add/" +
                            this.userLogged.dashboard.id +
                            "/" +
                            this.plant.id
                    )
                    .then(() => {
                        return this.disable = true;
                    });
            }
        },

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

        this.getPlant();
        this.isDisabled();

    },

    computed: {
        isDisabled: function() {
            if (this.userLogged != undefined && this.userLogged.dashboard.plantes != undefined) {
                this.userLogged.dashboard.plantes.forEach(plante => {
                    if (this.plant.id === plante.id) {
                        this.inDashboard = true;
                        return (this.disable = true);
                    }
                });
            }
        }
    }

};
</script>


