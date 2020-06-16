<template>
    <nav class="navbar navbar-light bg-light">
        <form class="form-inline my-2 my-lg-0" action="#" method="get">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Rechercher une plante" aria-label="Search" v-model="nameSelected" required>
            <button class="btn btn-outline-success my-2 my-sm-0" 
                    type="submit"
                    @click.prevent="$emit('get-nameParam',  {
                    name: getParams(params.nameSelected),
                    filter: true
                })"><i class="fa fa-search"></i></button>
        </form>
    </nav>
</template>

<script>

export default {
    name: 'BarreRecherche',

    data() {
        return {
            params: {
                nameSelected: "",
            }
        }
    },

    methods: {
        getParams(param) {
            if (param === "") {
                return null;
            }

            return param;
        }
    }

}
</script>


<style scoped lang="scss">

    .form-inline {
            flex-flow: row nowrap;
        }

</style>
