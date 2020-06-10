<template>
    <div class="home">
        <div class="container-fluid">
            <div class="row">
                <!-- left-side banner -->
                <div class="banner col-md-4 position-fixed">[banner]</div>

                <!-- main content -->
                <main class="main-content col-md-8 offset-md-4 container">
                    <div class="row">
                        <div class="col-sm-12">
                            <Navbar/>
                        </div>
                    </div>

                    <div class="title row">
                        <div class="col-md-12">
                            <p>Suivez l'évolution de vos plantes avec</p>
                            <h1>PlantBoard</h1>
                        </div>
                    </div>

                    <div class="content row">
                        <div class="col-md-12">
                            <p>Suivez, arrosez et planifiez votre entretient de plantes au quotidien grâce à ce gestionnaire de plantes de balcons et d'intérieurs. Vous venez d'acquérir une plante ? Inscrivez-vous pour créer votre dashboard.</p>
                        </div>
                    </div>

                    <div class="apperçu row">
                        <div class="col-md-6">[card-dashboard]</div>
                        <div class="col-md-6">[card-dashboard]</div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</template>


<style scoped lang="scss" src="./home.scss"></style>


<script>
import Navbar from '../components/Navbar.vue';

export default {
    name: "Home",
    components : {
        Navbar
    }
};
</script>


