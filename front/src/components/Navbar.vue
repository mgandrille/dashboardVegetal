<template>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><i class="fa fa-leaf"></i>  dashboard végétal</a>
<!-- **** Ajouter lien vers la page d'accueil **** -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">     <!-- BOUTTON CATALOGUE -->
                        <a class="nav-link" href="#">catalogue</a>
<!-- **** Ajouter lien vers la page de catalogue **** -->
                    </li>

                    <li class="nav-item dropdown">   <!-- BOUTTON CONNECTION -->
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- **** Si l'utilisateur est connecté : afficher prénom **** -->
                            bienvenue <span class="text-success font-weight-bold">  PRENOM  </span> !
                        <!-- **** Sinon :  **** -->
                            connection
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <!-- **** Si l'utilisateur est connecté :  **** -->
                            <a class="dropdown-item text-secondary" href="#">
<!-- **** Ajouter lien vers la page du dashboard **** -->
                                <i class="fa fa-leaf"></i>
                                mon dashboard
                            </a>
                            <a class="dropdown-item text-secondary" href="#">
<!-- **** Ajouter lien vers la page de déconnection **** -->
                                <i class="fa fa-sign-out"></i>
                                déconnection
                            </a>
                        <!-- **** Sinon :  **** -->
                            <a class="dropdown-item text-secondary" href="#">
<!-- **** Ajouter lien vers la page de connection **** -->
                                <i class="fa fa-user"></i>
                                connection
                            </a>
                            <a class="dropdown-item text-secondary" href="#">
<!-- **** Ajouter lien vers la page de création de compte **** -->
                                <i class="fa fa-user-plus"></i>
                                créer un compte
                            </a>                        
                        </div>
                    </li>

                    <li class="nav-item">     <!-- BOUTTON CONTACT / A PROPOS -->
                        <a class="nav-link" href="#">à propos / contact</a>
<!-- **** Ajouter lien vers la page de contact **** -->
                    </li>

                </ul>

                <form class="form-inline my-2 my-lg-0">    <!-- ESPACE DE RECHERCHE -->
                    <input class="form-control mr-sm-2" type="search" placeholder="Rechercher une plante" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                </form>
            
            </div>

        </nav>
    </div>
</template>


<script>
export default {

}
</script>


<style>

</style>
