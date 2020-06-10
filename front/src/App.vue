<template>
    <div id="app">
        <div class="main-content col-lg-8 offset-lg-4 container-lg bg-light fixed-top">
            <div class="row">
                <div class="col-sm-12">
                    <Navbar/>
                </div>
            </div>
        </div>
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
