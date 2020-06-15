<template>
    <div class="home">
        <div class="container-fluid">
            <div class="row">
                <!-- left-side banner -->
                <div class="banner col-lg-4 position-fixed "></div>

                <!-- main content -->
                <main class="main-content col-lg-8 offset-lg-4 container-lg bg-light">
                    
                    <div class="title row p-3">
                        <div class="col-lg-12">
                            <h1>Tout savoir sur nous...</h1>
                        </div>
                    </div>

                    <div class="content row p-3">
                        <div class="col-lg-12">
                            Jeune équipe dynamique et pleine d'idées, découvrez ceux qui ont fait naitre cette application !
                        </div>
                    </div>

                    <div class="card-deck">
                      <div class="card">
                        <img class="card-img-top" src="http://localhost:8888/uploads/img/carlyne.jpg" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">Carlyne</h5>
                          <p class="card-text">Ancienne graphiste, nouvellement développeuse web, elle s'éclate en front</p>
                          <p class="card-text"><small class="text-muted">Ses réseaux sociaux :</small></p>
                        </div>
                      </div>
                      <div class="card">
                        <img class="card-img-top" src="http://localhost:8888/uploads/img/marie.jpg" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">Marie</h5>
                          <p class="card-text">Fraichement débarquée dans le développement web, elle aide à la gestion de projet</p>
                          <p class="card-text"><small class="text-muted">Ses réseaux sociaux :</small></p>
                        </div>
                      </div>
                      <div class="card">
                        <img class="card-img-top" src="http://localhost:8888/uploads/img/theau.jpg" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">Théau</h5>
                          <p class="card-text">Depuis sa découverte du développement web, rien ne saurait le détourner du back</p>
                          <p class="card-text"><small class="text-muted">Ses réseaux sociaux :</small></p>
                        </div>
                      </div>
                    </div>

                    <Footer/>
                </main>
            </div>
        </div>

        
    </div>
</template>


<style scoped lang="scss" src="./about.scss"></style>


<script>
import PlantCardHome from '../../components/plant-card/PlantCardHome.vue';
import Footer from '../../components/Footer.vue';

export default {
    name: "Home",
    components : {
        PlantCardHome,
        Footer
    },


};
</script>


