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
                            <p>Suivez, arrosez et planifiez votre entretient de plantes au quotidien grâce à ce gestionnaire de plantes de balcons et d'intérieurs. Vous venez d'acquérir une plante ? 
                                <a href="#">Inscrivez-vous</a> pour créer votre dashboard.</p>
                        </div>
                    </div>

                    <div class="row p-3">
                        <div class="col-lg-12">
                            <h2>Voir les derniers dashboard créés</h2>
                        </div>
                    </div>

                    <div class="apperçu row p-3 justify-content-center justify-content-md-around">
                        <!-- Attention, infos en dur. Faire un v-for pour afficher les 2 derniers dashboard de la bdd-->
                        <PlantCardHome />
                        <PlantCardHome />
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <Footer/>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</template>


<style scoped lang="scss" src="./home.scss"></style>


<script>
import Footer from '../../components/Footer.vue';
import PlantCardHome from '../../components/plant-card/PlantCardHome.vue';

export default {
    name: "Home",
    components : {
        Footer,
        PlantCardHome
    }
};
</script>


