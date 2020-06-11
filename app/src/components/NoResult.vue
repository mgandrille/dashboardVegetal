<template>
    
    <div class="title mt-5 p-3">

        <h1 class="text-uppercase text-center">oh non...</h1>
        <h2 class="text-center">... {{ message }} ...</h2>

        <div class="container d-flex justify-content-center">
            <img src="https://media.giphy.com/media/SVU9KcXqmIx72Ody0N/200w_d.gif" alt="">
            <!-- <img src="{assets/img/page404.gif}" alt="giffy plante triste"> -->
        </div>

</div>


    
</template>

<script>
export default {
    name: 'NoResult',
    props: {
        message: String
    }

}
</script>

<style>

</style>