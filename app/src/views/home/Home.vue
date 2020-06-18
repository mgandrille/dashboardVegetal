<template>
    <div class="home">
        <div class="container-fluid">
            <div class="row">
                <!-- left-side banner -->
                <div class="banner col-lg-4 position-fixed "></div>

                <!-- main content -->
                <main class="main-content col-lg-8 offset-lg-4 container-lg bg-light">

                    <div id="top" class="title row p-3">
                        <div class="col-lg-12">
                            <p>Suivez l'évolution de vos plantes avec</p>
                            <h1>PlantBoard</h1>
                            <hr>
                        </div>
                    </div>

                    <div class="content row p-3">
                        <div class="col-lg-12 mb-4">
                            <h3 class="text-primary mb-5">Suivez, arrosez et planifiez votre entretien de plantes au quotidien grâce à ce gestionnaire de plantes de balcons et d'intérieurs.</h3>

                            <div v-if="userLogged" class="text-capitalize mb-3">
                                <router-link :to="{ path: `/dashboard/${userLogged.dashboard.id}` }" class="btn btn-lg btn-primary text-light" tag="btn">
                                    <i class="fa fa-leaf"></i>
                                    aller sur mon dashboard
                                    <i class="fa fa-leaf"></i>
                                </router-link>
                            </div>

                            <div v-else class="row text-center align-middle">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <p>Vous avez déjà un dashboard ? </p>
                                    <router-link :to="{ path: '/authentification/connexion' }" class="btn btn-lg btn-primary text-light" tag="btn">
                                        <i class="fa fa-user"></i>
                                        connectez vous !
                                    </router-link>
                                </div>
                                <div class="col-md-6">
                                    <p>Vous venez d'acquérir une plante ? <br> Venez créer votre dashboard !</p>
                                    <router-link :to="{path: '/authentification/inscription'}" class="btn btn-lg btn-secondary text-light" tag="btn">
                                        <i class="fa fa-leaf"></i> Inscrivez-vous <i class="fa fa-leaf"></i>
                                    </router-link>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row p-3">
                        <div class="col-lg-12">
                            <h2>Voir un exemple de dashboard</h2>
                            <p>Découvrez comment nos utilisateurs entretiennent leurs plantes grâce à Plantboard. </p>
                        </div>
                    </div>

                    <div class="apperçu row p-3 justify-content-center justify-content-md-around mb-5">                        
                        <PlantCardHome v-for="(dashboard, index) in dashboards" :key="index" :dashboard="dashboard">
                        </PlantCardHome>
                    </div>

                    <Footer/>
                </main>
            </div>
        </div>

    </div>
</template>


<style scoped lang="scss" src="./home.scss"></style>


<script>
import PlantCardHome from '../../components/plant-card/PlantCardHome.vue';
import Footer from '../../components/Footer.vue';

export default {
    name: "Home",
    components : {
        PlantCardHome,
        Footer
    },

    data() {
        return {
            dashboards: [],
            userLogged: []
        }
    },

    created() {
        this.$http
            .get("api/user")
            .then(result => {
                if(Object.keys(result.data).length) {
                    this.userLogged = result.data;
                } else {
                    this.userLogged = null;
                }
        });

        this.$http.get('/api/bigdash')
            .then((result) => {
                this.dashboards = result.data;
            });
	}
};
</script>


