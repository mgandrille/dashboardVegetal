<template>

    <footer class="footer bg-light p-3 row justify-content-between align-items-center">
        <div class="col-md-10 row align-items-center h-100 mb-3 mb-md-0 text-center text-md-left">
            <p class="col-md-auto m-md-0 mr-2 p-0"><span class="text-primary font-weight-bold"><i class="fa fa-leaf"></i> &nbsp; Dashboard Végétal</span></p>
            <p class="font-italic ml-2 col-md-auto m-md-0 p-0">&copy; WF3 équipe 2020 - Carlyne, Marie et Théau</p>
        </div>
        
        <a class="col-md-2 text-center text-md-right"  href="" v-scroll-to="'#top'">Back to top</a>
    </footer>

</template>

<script>
export default {
    name: 'Footer'
}
</script>

<style scoped lang="scss">
    a {
        display: block;  
    }
</style>