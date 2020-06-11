<template>
    <div class="home">
        <div class="container-fluid">
            <div class="row">
                <!-- left-side filter -->
                <div class="filtrage col-lg-2 position-fixed">filtrage</div>

                <!-- main content -->
                <main class="main-content row col-lg-10 offset-lg-2 container-lg bg-light">
                    <div class="col-lg-9 m-3">
                        <h2 class="mb-3">Prochain arrosage</h2>
                        <div class="row bg-primary justify-content-center">
                            <PlantCard />
                            <PlantCard />
                        </div>

                        <div class="row">
                            <h2 class="mb-3 m-3">Toutes vos plantes</h2>

                            <div class="row flex-nowrap overflow-auto">
                                <PlantCard />
                                <PlantCard />
								<PlantCard />
								<PlantCard />
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">widget</div>
                </main>
            </div>
        </div>
    </div>
</template>


<style scoped lang="scss" src="./dashboard.scss"></style>

<script>
import PlantCard from "../../components/plant-card/PlantCard.vue";

export default {
    name: "Dashboard",
    components: {
        PlantCard
    }
};
</script>


