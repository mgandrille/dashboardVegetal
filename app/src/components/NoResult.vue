<template>
    
    <div class="title p-3">

        <h1 class="text-uppercase text-center">oh non...</h1>
        <h3 class="text-center">... {{ message }} ...</h3>

        <div class="container d-flex justify-content-center">
            <img src="https://media.giphy.com/media/SVU9KcXqmIx72Ody0N/200w_d.gif" alt="">
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

<style scoped lang="scss">
    @import '../variables-styles.scss';
    h3 {
        color: $annotations-color;
    }
</style>