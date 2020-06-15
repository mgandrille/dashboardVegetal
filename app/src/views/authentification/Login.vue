<template>
	<div class="authentification">
		<div class="container-fluid">
			<div class="row">
				<!-- left-side banner -->
				<div class="banner col-lg-4 position-fixed"></div>

				<!-- main content -->
				<main class="main-content col-lg-8 offset-lg-4 container-lg bg-light">
					<div class="title row mt-5 p-3">
                        <div class="col-lg-12">
                            <p>Rejoignez-nous</p>
							<!-- v-if afficher connexion ou inscription -->
                            <h1>Authentification</h1>
                        </div>
                    </div>

					<div class="title row mt-5 p-3">
                        <div class="col-lg-12" v-html="loginForm">
							
                        </div>
                    </div>
					
				</main>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "Login",
	data() {
		return {
			loginForm: null,
		}
	},
	mounted() {
		this.$http.get('/api/login')
			.then(result => this.loginForm = result.data);
	}
};
</script>

<style scoped lang="scss" src="./authentification.scss"></style>