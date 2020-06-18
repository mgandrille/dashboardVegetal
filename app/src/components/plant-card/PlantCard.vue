<template>
        <div
            :class="classes"
            @mouseover="hoverOver"
            @mouseout="hoverOut"
            class="animCard card m-2 m-lg-5 col-12 col-md-auto"
            style="width: 18rem;"
        >
            <div
                router-link
                :to="{ path: '../plante/detail/' + plant.id }"
                tag="div"
                class="d-flex flex-md-column"
            >
                <router-link :to="{ path: '../plante/detail/' + plant.id }" tag="img"
                    v-bind:src="'http://localhost:8888/uploads/pictures/' + plant.picture"
                    class="card-img-top p-3"
                    alt="image"
                />
                <div class="d-flex flex-column card-body">
                    <div
                        class="alert alert-success alert-dismissible fade show d-none"
                        v-bind:class="{ 'd-block': isAlert }"
                        role="alert"
                        v-if="userLogged != null"
                    >La plante a été ajoutée à votre <router-link :to="{ path: `/dashboard/${userLogged.dashboard.id}` }" class="font-weight-bold"> Dashboard </router-link> !</div>

                    <router-link :to="{ path: '../plante/detail/' + plant.id }" class="card-title" tag="h5">{{ plant.name }}</router-link>
                    <p class="card-text">{{ plant.description.substring(0, 85) }}...</p>
                </div>
            </div>

            <footer v-if="userLogged != null" class="footer my-2 text-right is-hidden">
                <button
                    class="btn btn-secondary ml-auto d-none"
                    @click.prevent="deletePlant()"
                    v-bind:class="{ 'd-inline-block': inDashboard }"
                >Supprimer</button>
                <button
                    class="btn btn-primary ml-auto"
                    @click.prevent="addPlant()"
                    v-bind:class="{ disabled: isDisable, 'd-none': inDashboard }"
                    :disabled="isDisable"
                >Ajouter +</button>
            </footer>
            
        </div>
</template>

<script>
export default {
    name: "PlantCard",
    props: [
        "plantSrcImg",
        "plant",
        "userLogged",
        "userPlantes",
        "inDashboard",
        "dashboard",
        "toArrose"
    ],

    data() {
        return {
            isDisable: false,
            inDashboard: false,
            classes: [],
            isAlert: false
        };
    },

    created() {
        this.$http.get("api/user").then(result => {
            if (Object.keys(result.data).length) {
                this.userLogged = result.data;
            } else {
                this.userLogged = null;
            }
        });
        this.isDisabled();
    },

    methods: {
        addPlant() {
            if (this.userLogged != null || this.userPlantes != null) {
                this.$http
                    .get(
                        "dashboard/add/" +
                            this.userLogged.dashboard.id +
                            "/" +
                            this.plant.id
                    )
                    .then(() => {
                        return [(this.isAlert = true), (this.isDisable = true)];
                    });
            }
        },
        deletePlant() {
            this.$http
                .get(
                    "dashboard/remove/" +
                        this.userLogged.dashboard.id +
                        "/" +
                        this.plant.id
                )
                .then(() => {
                    console.log("plante supprimée");
                    window.location.reload();
                });
        },
        hoverOver() {
            this.classes.push("animated");
        },
        hoverOut() {
            this.classes = [];
        }
    },

    computed: {
        isDisabled: function() {
            if (this.userLogged != null || this.userPlantes != null) {
                this.userPlantes.forEach(plante => {
                    if (this.plant.id === plante.id) {
                        this.inDashboard = true;
                        return (this.isDisable = true);
                    }
                });
            }
        }
    }
};
</script>

<style scoped lang="scss" src="./plant-card.scss"></style>