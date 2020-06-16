<template>
    <div class="page404">

        <div class="container-fluid">
            <div class="row">
                <div class="container mt-4 text-center ">
                    <NoResult message="Vous êtes sur la page 404"/>
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