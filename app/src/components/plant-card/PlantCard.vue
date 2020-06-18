<template>
    <router-link :to="{ path: '../plante/detail/' + plant.id }" tag="div">
        <div
            :class="classes"
            @mouseover="hoverOver"
            @mouseout="hoverOut"
            class="animCard card m-2 m-lg-5 col-12 col-md-auto"
            style="width: 18rem;"
        >
            <div class="d-flex flex-md-column">
                <img
                    v-bind:src="'http://localhost:8888/uploads/pictures/' + plant.picture"
                    class="card-img-top p-3"
                    alt="image"
                />
                <div class="d-flex flex-column card-body">
                    <div
                        class="alert alert-success alert-dismissible fade show d-none"
                        v-bind:class="{ 'd-block': isAlert }"
                        role="alert"
                        v-if="userLogged != null"
                    >La plante a été ajoutée à votre <router-link :to="{ path: `/dashboard/${userLogged.dashboard.id}` }" class="font-weight-bold"> Dashboard </router-link> !</div>

                    <h5 class="card-title">{{ plant.name }}</h5>
                    <p class="card-text">{{ plant.description.substring(0, 85) }}...</p>
                </div>
            </div>
            
		<footer v-if="userLogged != undefined" class="my-2 text-right">
                
                <button class="btn btn-primary ml-auto d-none" @click.prevent="deletePlant()" v-bind:class="{ 'd-inline-block': inDashboard }">Supprimer</button>
                <button class="btn btn-primary ml-auto" @click.prevent="addPlant()" v-bind:class="{ disabled: disable, 'd-none': inDashboard }" :disabled="disable">Ajouter +</button>
        </footer>
    </div>

    </router-link>

</template>

<script>
export default {
    name: "PlantCard",
    props: [
        'plantSrcImg',
        'plant',
        'userLogged',
        'userPlantes',
        'inDashboard',
        'dashboard'
    ],


    data() {
        return {
            disable: false,
            inDashboard: false,
            classes: [],
            isAlert: false
        };
    },

    created() {
        this.isDisabled();
        
    },

    methods: {
        addPlant() {
            if (this.userLogged != undefined || this.userPlantes != undefined) {
                this.$http
                    .get(
                        "dashboard/add/" +
                            this.userLogged.dashboard.id +
                            "/" +
                            this.plant.id
                    )
                    .then(() => {
                        return [(this.isAlert = true), (this.disable = true)];
                    });
            }
        },
        deletePlant() {
            this.$http.get('dashboard/remove/' + this.userLogged.dashboard.id + '/' + this.plant.id)
            .then(() => {
                console.log('plante supprimée');
                window.location.reload();
            })
        },
        hoverOver(){
            this.classes.push('animated')
        },
        hoverOut(){
            this.classes = []
        },
    },

    computed: {
        isDisabled: function() {
            if (this.userLogged != undefined || this.userPlantes != undefined) {
                this.userPlantes.forEach(plante => {
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

<style scoped lang="scss" src="./plant-card.scss"></style>