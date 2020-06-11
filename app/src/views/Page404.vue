<template>
    <div class="page404">

        <div class="container-fluid">
            <div class="row">
                <div class="container mt-4 text-center ">
                    <div class="title mt-5 p-3">

                        <h1 class="text-uppercase text-center">oh non...</h1>
                        <h2 class="text-center">... Vous êtes sur la page 404...</h2>
                    </div>

                    <NoResult/>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import NoResult from '../components/NoResult.vue';
export default {
    name: "page404",
    components: {
        NoResult
    }

}
</script>

<style>

</style>