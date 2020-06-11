<template>
        <nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed fixed-top" id="top">

            <router-link :to="{ path: '/' }" class="navbar-brand text-capitalize"><i class="fa fa-leaf"></i>  dashboard végétal </router-link>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto text-capitalize">

                    <li class="nav-item">     <!-- LIEN VERS LA PAGE CATALOGUE -->
                        <router-link :to="{ path: '/catalogue' }" class="nav-link">catalogue</router-link>
                    </li>

                    <li class="nav-item dropdown">   <!-- BOUTTON DE CONNECTION -->
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- **** Si l'utilisateur est connecté : afficher prénom **** -->
                            bienvenue <span class="text-primary font-weight-bold">  PRENOM  </span> !
                        <!-- **** Sinon :  **** -->
                            connection
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <!-- **** Si l'utilisateur est connecté :  **** -->
                            <router-link :to="{ path: '/dashboard', params: {id: 123 } }" class="dropdown-item text-secondary">
                                <i class="fa fa-leaf"></i>
                                mon dashboard
                            </router-link>
                            <router-link :to="{ path: '/deconnection' }" class="dropdown-item text-secondary" href="#">
                                <i class="fa fa-sign-out-alt"></i>
                                déconnection
                            </router-link>
                        <!-- **** Sinon :  **** -->
                            <router-link :to="{ path: '/authentification/connection' }" class="dropdown-item text-secondary" href="#">
                                <i class="fa fa-user"></i>
                                connection
                            </router-link>
                            <router-link :to="{ path: '/authentification/inscription' }" class="dropdown-item text-secondary" href="#">
                                <i class="fa fa-user-plus"></i>
                                créer un compte
                            </router-link>                        
                        </div>
                    </li>

                    <li class="nav-item">     <!-- LIEN VERS LA PAGE CONTACT / A PROPOS -->
                        <router-link :to="{ path: '/about' }" class="nav-link">à propos / contact</router-link>
                    </li>

                </ul>
            
                <BarreRecherche/>

            </div>

        </nav>
</template>


<script>
import BarreRecherche from '../components/BarreRecherche.vue';

export default {
    name: "Navbar",
    components: {
        BarreRecherche
    }

}
</script>


<style scoped lang="scss">
    @import '../variables-styles.scss';

    nav {
        height: $navbar-height;
    }
</style>
