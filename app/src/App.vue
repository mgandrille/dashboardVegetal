<template>
    <div id="app">
        <Navbar/>
        
        <router-view/>
        <Footer/>
        
        

    </div>
</template>

<style lang="scss" src="./styles.scss"></style>

<script>
import Navbar from './components/Navbar.vue';
import Footer from './components/Footer.vue';

export default {
    name: "App",
    components : {
        Navbar,
        Footer
    }
};
</script>
