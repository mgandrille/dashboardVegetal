<template>
    <div class="card m-2 m-lg-5 col-12 col-md-auto" style="width: 18rem;">
        <div class="d-flex flex-md-column">
            <img
                v-bind:src="'http://localhost:8888/uploads/pictures/' + plantSrcImg"
                class="card-img-top p-3"
                alt="image"
            />
            <div class="d-flex flex-column card-body">
                <slot name="plant-name"></slot>
                <slot name="plant-description"></slot>
            </div>
        </div>

		<footer class="m-2 text-right">
                <a href="#" class="btn btn-primary ml-auto">Voir</a>
                <a href="#" class="btn btn-primary ml-auto" @click="addAction(1)">Ajouter +</a>
        </footer>
    </div>
</template>

<script>
export default {
    name: "PlantCard",
    props: ['plantSrcImg', 'addAction']
};
</script>

<style scoped lang="scss" src="./plant-card.scss"></style>