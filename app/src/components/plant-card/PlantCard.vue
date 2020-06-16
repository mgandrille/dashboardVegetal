<template>
    <div class="card m-2 m-lg-5 col-12 col-md-auto" style="width: 18rem;">
        <div class="d-flex flex-md-column">
            <img
                v-bind:src="'http://localhost:8888/uploads/pictures/' + plant.picture"
                class="card-img-top p-3"
                alt="image"
            />
            <div class="d-flex flex-column card-body">
                <h5 class="card-title">{{ plant.name }}</h5>
                <p class="card-text">{{ plant.description.substring(0, 85) }}...</p>
            </div>
        </div>

		<footer class="m-2 text-right">
<<<<<<< HEAD
                <router-link :to="{ path: 'plante/detail/' + plant.id }" class="btn btn-primary ml-auto" >Voir</router-link>
                <a href="#" class="btn btn-primary ml-auto" @click="addPlant()" v-bind:class="{ disabled: disable }">Ajouter +</a>
=======
                <router-link :to="{ path: '/plante/detail/' + plant.id }" class="btn btn-primary ml-auto" >Voir</router-link>
                <a href="#" class="btn btn-primary ml-auto" @click="addPlant()" v-bind:class="{ disabled: plant.isDisabled }">Ajouter +</a>
>>>>>>> f2358f613f1df02cf45beb2b49029fbfd7b47c74
        </footer>
    </div>
</template>

<script>
export default {
    name: "PlantCard",
    props: [
        'plantSrcImg', 
        'plant',
        'userLogged',
        'userPlantes'
    ],

    data() {
        return {
            disable: false,
            inDashboard: false
        }
    },

    created() {
        this.isDisabled();
    },

    methods:{
        addPlant() {
<<<<<<< HEAD
            this.$http.get('dashboard/add/' + this.userLogged.dashboard.id + '/' + this.plant.id)
=======
            this.$http.get('dashboard/add/1/' + this.plant.id)
>>>>>>> f2358f613f1df02cf45beb2b49029fbfd7b47c74
            .then(() => {
                this.isDisabled()
            })
        },
    },

    computed: {
        isDisabled: function() {
            this.userPlantes.forEach(plante => {
                if (this.plant.id === plante.id) {
                    this.inDashboard = true;
                    return this.disable = true
                }
            });
        }

    }

};
</script>

<style scoped lang="scss" src="./plant-card.scss"></style>