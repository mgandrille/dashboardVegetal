<template>
    <div class="detail">
        <div class="container-fluid">
            <div class="row">
                <!-- left-side banner mettre le style en dynamique-->
                <div class="banner col-lg-7"></div>

                <!-- main content -->
                <main class="main-content col-lg-5 offset-lg-7 container-lg bg-light">
                    <div class="title row mt-5 p-3">
                        <div class="col-lg-12">
                            <h2>Ficcus</h2>
                        </div>
                    </div>

                    <div class="content row p-3">
                        <div class="col-lg-12">
                            <p>Description</p>
                            <hr />
                            <ul>
                                <li>Difficulté : Difficile</li>
                                <li>Espèce : Plantosous</li>
                                <li>Catégorie : Plantimus</li>
                                <li>Type : Planticus</li>
                                <li>Floraison : Juillet</li>
                            </ul>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <footer class="footer-detail px-3 pt-3 container-fluid">
            <div class="row informations text-light col-12">
                <div class="col-md-4">
                    <div class="col-md-auto">
                        <h4>
                            Arrosage :
                            <span>Fréquent</span>
                        </h4>
                    </div>

                    <hr />

                    <div class="col-md-auto">
                        <h4>
                            Ensoleillement :
                            <span>Fort</span>
                        </h4>
                    </div>

                    <hr class="d-md-none" />
                </div>

                <div class="col-md-4">
                    <div class="col-md-auto">
                        <h4>
                            Boutage :
                            <span>Mai</span>
                        </h4>
                    </div>

                    <hr />

                    <div class="col-md-auto">
                        <h4>
                            Rempotage :
                            <span>Avril</span>
                        </h4>
                    </div>

                    <hr class="d-md-none" />
                </div>

                <div class="col-md-4">
                    <div class="col-md-auto">
                        <h4>
                            Taille :
                            <span>Juin</span>
                        </h4>
                    </div>

                    <hr />
                </div>
            </div>
        </footer>
    </div>
</template>


<style scoped lang="scss" src="./detail.scss"></style>


<script>
export default {
    name: "Detail"
};
</script>


