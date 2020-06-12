<template>
    <div class="card m-2 m-lg-5 col-12 col-md-auto" v-bind:class="{ arrosage : isArrose}" style="width: 18rem;">
        <div class="d-flex flex-md-column">
            <img
                src="https://i.postimg.cc/GpFXntZY/Pngtree-hand-drawn-noise-illustration-green-4058540.png"
                class="card-img-top p-3"
                alt="image"
            />
            <div class="d-flex flex-column card-body">
                <h5 class="card-title">Nom plante</h5>
                <p class="card-text">Description</p>
            </div>
        </div>

		<footer class="m-2 text-right">
                <a href="#" class="btn btn-primary ml-auto">Voir</a>
                <a href="#" class="btn btn-primary ml-auto">Ajouter +</a>
        </footer>
    </div>
</template>

<script>
export default {
    name: "PlantCard"

};
</script>

<style scoped lang="scss" src="./plant-card.scss"></style>