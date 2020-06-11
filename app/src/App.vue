<template>
    <div id="app">
        <Navbar/>
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
    }
};
</script>
