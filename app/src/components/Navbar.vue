<template>
        <nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed fixed-top" id="top">

            <router-link :to="{ path: '/' }" class="navbar-brand text-capitalize"><i class="fa fa-leaf"></i>  dashboard végétal </router-link>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse bg-light navbar-light" id="navbarSupportedContent">
                <ul class="navbar-nav container text-capitalize d-flex justify-content-md-between mx-4">

                    <li class="nav-item">     <!-- LIEN VERS LA PAGE CATALOGUE -->
                        <router-link :to="{ path: '/catalogue' }" class="nav-link">catalogue</router-link>
                    </li>

                    <li class="nav-item dropdown">   <!-- BOUTTON DE CONNECTION -->
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span v-if="userLogged"> 
                                bienvenue <span class="text-primary font-weight-bold">  {{ userLogged.username }}  </span> !
                            </span>
                            <span v-else>  
                                connection
                            </span>
                            
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <span v-if="userLogged"> 
                                <router-link :to="{ path: '/dashboard', params: {id: 123 } }" class="dropdown-item text-secondary">
                                    <i class="fa fa-leaf"></i>
                                    mon dashboard
                                </router-link>
                                <a class="dropdown-item text-secondary" href="http://localhost:8888/logout">
                                    <i class="fa fa-sign-out-alt"></i>
                                    déconnection
                                </a>
                            </span>
                            <span v-else>  
                                <router-link :to="{ path: '/authentification/connexion' }" class="dropdown-item text-secondary" href="#">
                                    <i class="fa fa-user"></i>
                                    connection
                                </router-link>
                                <router-link :to="{ path: '/authentification/inscription' }" class="dropdown-item text-secondary" href="#">
                                    <i class="fa fa-user-plus"></i>
                                    créer un compte
                                </router-link>
                            </span>                        
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
    },
    props: [
        "userLogged"
    ]


}
</script>


<style scoped lang="scss">
    @import '../variables-styles.scss';

    nav {
        height: $navbar-height;
    }

</style>
