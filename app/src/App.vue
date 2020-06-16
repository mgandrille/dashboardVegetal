<template>
    <div id="app">
        <Navbar :userLogged="userLogged"/>
        
        <router-view/>
        
        
        

    </div>
</template>

<style lang="scss" src="./styles.scss"></style>

<script>
import Navbar from './components/Navbar.vue';

export default {
    name: "App",
    components : {
        Navbar
    },

    data() {
        return {
            userLogged: []
        }
    },

    created() {

        this.$http.get('api/user')
            .then((result) => {
                this.$store.state.userLogged = result.data
        })
            .then(() => {
                // Si l'utilisateur n'est pas connecté, retourne un tableau vide donc userLogged est NULL
                if(this.$store.state.userLogged.length < 1) {
                    this.userLogged = null;
                }
                // Si l'utilisateur est connecté, retourne un objet qui est inséré dans userLogged
                else {
                    this.userLogged = this.$store.state.userLogged;
                }
            });
    }
};
</script>
