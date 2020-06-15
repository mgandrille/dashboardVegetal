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
                <router-link :to="{ path: 'plante/detail/' + plant.id }" class="btn btn-primary ml-auto" >Voir</router-link>
                <a href="#" class="btn btn-primary ml-auto" @click="addPlant">Ajouter +</a>
        </footer>
    </div>
</template>

<script>
export default {
    name: "PlantCard",
    props: ['plantSrcImg', 'plant'],

    methods:{
        addPlant(plant) {
            this.$http.post('dashboard/add/2', { plant: plant })
            .then(() => {
                console.log( plant.name + 'ajouté');
            })
        }

    },

    created() {

    }

};
</script>

<style scoped lang="scss" src="./plant-card.scss"></style>