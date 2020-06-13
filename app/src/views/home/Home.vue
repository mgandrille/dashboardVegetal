<template>
    <div class="home">
        <div class="container-fluid">
            <div class="row">
                <!-- left-side banner -->
                <div class="banner col-lg-4 position-fixed"></div>

                <!-- main content -->
                <main class="main-content col-lg-8 offset-lg-4 container-lg bg-light">
                    
                    <div class="title row mt-5 p-3">
                        <div class="col-lg-12">
                            <p>Suivez l'évolution de vos plantes avec</p>
                            <h1>PlantBoard</h1>
                        </div>
                    </div>

                    <div class="content row p-3">
                        <div class="col-lg-12">
                            <p>Suivez, arrosez et planifiez votre entretien de plantes au quotidien grâce à ce gestionnaire de plantes de balcons et d'intérieurs. Vous venez d'acquérir une plante ? 
                                <router-link :to="{path: '/authentification/inscription'}">Inscrivez-vous</router-link> pour créer votre dashboard.</p>
                        </div>
                    </div>

                    <div class="row p-3">
                        <div class="col-lg-12">
                            <h2>Voir un exemple de dashboard</h2>
                            <p>Découvrez comment nos utilisateurs entretiennent leurs plantes grâce à Plantboard. </p>
                        </div>
                    </div>

                    <div class="apperçu row p-3 justify-content-center justify-content-md-around">                        <PlantCardHome />
                        <PlantCardHome v-for="(dashboard, index) in dashboards" :key="index" :dashboard="dashboard">
                        </PlantCardHome>
                    </div>
                </main>
            </div>
        </div>
    </div>
</template>


<style scoped lang="scss" src="./home.scss"></style>


<script>
import PlantCardHome from '../../components/plant-card/PlantCardHome.vue';

export default {
    name: "Home",
    components : {
        PlantCardHome
    },

    data() {
        return {
            dashboards: [
                {id: 1, userProfil : 'Richard', plantsNb: 12},
                {id: 2, userProfil : 'Rosa', plantsNb: 25}
            ]
        }
    }

    // created() {
    //     this.$http.get('/api/bigdash')
    //         .then((result) => {
    //             this.dashboards = result.data;
    //         })
	// }
};
</script>


