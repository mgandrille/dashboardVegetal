<template>
    <div class="detail">
        <div class="container-fluid">
            <div class="row">
                <!-- left-side banner mettre le style en dynamique-->
                <div class="banner col-lg-7 position-fixed"></div>

                <!-- main content -->
                <main class="main-content col-lg-5 offset-lg-7 container-lg bg-light">
                    
                    <div class="title row mt-5 p-3">
                        <div class="col-lg-12">
                            <h2>Name</h2>
                        </div>
                    </div>

                    <div class="content row p-3">
                        <div class="col-lg-12">
							<p>Description</p>
							<hr>
                            <ul>
								<li>Difficulté :</li>
								<li>Espèce :</li>
								<li>Catégorie :</li>
								<li>Type : </li>
								<li>Floraison : </li>
							</ul>
                        </div>
                    </div>
                </main>
            </div>

			<footer class="row footer-detail position-fixed fixed-bottom">
				<div class="col-12">
					<ul class="text-light">
						<li>Arrosage :</li>
						<li>Ensoleillement :</li>
						<li>Boutage :</li>
						<li>Rempotage :</li>
						<li>Taille :</li>
					</ul>
				</div>
			</footer>
        </div>
    </div>
</template>


<style scoped lang="scss" src="./detail.scss"></style>


<script>

export default {
    name: "Detail"
};
</script>


