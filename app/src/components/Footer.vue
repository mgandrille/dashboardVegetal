<template>
    <!-- <footer class="col-12 bg-light">
        <div class="container">
            <p class="float-right">
            <a href="#top">Back to top</a>
        </p>
        <p><span class="text-primary font-weight-bold"><i class="fa fa-leaf"></i>  Dashboard Végétal</span> </p>
        <p class="font-italic">&copy; WF3 équipe 2020 - Carlyne, Marie et Théau</p>
        </div>
    </footer> -->

    <footer class="footer bg-light">
        <div class="container">
            <p class="float-right">
                <a href="#top">Back to top</a>
            </p>

            <p><span class="text-primary font-weight-bold"><i class="fa fa-leaf"></i>  Dashboard Végétal</span> </p>
            <p class="font-italic">&copy; WF3 équipe 2020 - Carlyne, Marie et Théau</p>
        </div>
    </footer>
</template>

<script>
export default {
    name: 'Footer'
}
</script>

<style scoped lang="scss">
    @import '../variables-styles.scss';

    footer {
        z-index: 400;
        position: absolute; 
        width: 100%; 
    }
</style>