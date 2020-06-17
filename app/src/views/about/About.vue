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
                        <img @mouseover="hoverOver" @mouseout="hoverOut"  class="card-img-top" :src="sourceC" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">Carlyne</h5>
                          <p class="card-text">Ancienne graphiste, nouvellement développeuse web, elle s'éclate en front</p>
                          <p class="card-text"><small class="text-muted">Ses réseaux sociaux : 
                            <a href="https://github.com/carlyne"><i class="fab fa-github"></i></a>
                            <a href="https://www.linkedin.com/in/carlyne-lapierre/"><i class="fab fa-linkedin"></i></a>
                            </small></p>
                        </div>
                      </div>
                      <div class="card">
                        <img @mouseover="hoverOverM" @mouseout="hoverOutM" class="card-img-top" :src="sourceM" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">Marie</h5>
                          <p class="card-text">Fraichement débarquée dans le développement web, elle sublime la connexion front et back ainsi que la gestion de projet</p>
                          <p class="card-text"><small class="text-muted">Ses réseaux sociaux : 
                            <a href="https://github.com/mgandrille"><i class="fab fa-github"></i></a>
                            <a href="https://www.linkedin.com/in/marie-gandrille/"><i class="fab fa-linkedin"></i></a>
                            </small></p>
                        </div>
                      </div>
                      <div class="card">
                        <img @mouseover="hoverOverT" @mouseout="hoverOutT" class="card-img-top" :src="sourceT" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">Théau</h5>
                          <p class="card-text">Depuis sa découverte du développement web, rien ne saurait le détourner du back</p>
                          <p class="card-text"><small class="text-muted">Ses réseaux sociaux : 
                            <a href="https://github.com/FatalTio"><i class="fab fa-github"></i></a>
                            <a href="https://www.linkedin.com/in/th%C3%A9au-roffat/"><i class="fab fa-linkedin"></i></a>
                            </small></p>
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
    data(){
        return {
            sourceC: "http://localhost:8888/uploads/img/carlyne2.jpg",
            sourceM: "http://localhost:8888/uploads/img/marie.jpg",
            sourceT: "http://localhost:8888/uploads/img/theau.jpg"
        };
    },

    methods: {
        hoverOver(){
            this.sourceC = "http://localhost:8888/uploads/img/giphy2.gif"
        },
        hoverOut(){
            this.sourceC = "http://localhost:8888/uploads/img/carlyne2.jpg"
        },

        hoverOverM(){
            this.sourceM = "http://localhost:8888/uploads/img/marie.gif"
        },
        hoverOutM(){
            this.sourceM = "http://localhost:8888/uploads/img/marie.jpg"
        },

        hoverOverT(){
            this.sourceT = "http://localhost:8888/uploads/img/giphy.gif"
        },
        hoverOutT(){
            this.sourceT = "http://localhost:8888/uploads/img/theau.jpg"
        }
    }

};
</script>


