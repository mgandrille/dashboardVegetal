<template>
    <div :class="classes" @mouseover="hoverOver" @mouseout="hoverOut" class="card m-2 m-lg-5 col-12 col-md-auto" style="width: 18rem;">
        <div class="d-flex flex-md-column">
            <img
                v-bind:src="'http://localhost:8888/uploads/pictures/' + plant.picture"
                class="card-img-top p-3"
                alt="image"
            />
            <div class="d-flex flex-column card-body">
                <div class="alert alert-success alert-dismissible fade show d-none" v-bind:class="{ 'd-block': isAlert }" role="alert">
                    La plante a été ajoutée à votre Dashboard !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h5 class="card-title">{{ plant.name }}</h5>
                <p class="card-text">{{ plant.description.substring(0, 85) }}...</p>
            </div>
        </div>

		<footer class="m-2 text-right">
                <router-link :to="{ path: 'plante/detail/' + plant.id }" class="btn btn-primary ml-auto" >Voir</router-link>
                <button class="btn btn-primary ml-auto" @click.prevent="addPlant()" v-bind:class="{ disabled: disable }">Ajouter +</button>
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
            inDashboard: false,
            classes: [],
            isAlert: false
        }
    },

    created() {
        this.isDisabled();
    },

    methods:{
        addPlant() {
            this.$http.get('dashboard/add/' + this.userLogged.dashboard.id + '/' + this.plant.id)
            .then(() => {
                return [this.isAlert = true, this.disable = true]
            })
        },
        hoverOver(){
            this.classes.push('animated')
        },
        hoverOut(){
            this.classes = []
        }
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