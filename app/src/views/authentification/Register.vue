<template>
	<div class="authentification">
		<div class="container-fluid">
			<div class="row">
				<div class="banner col-lg-4 position-fixed"></div>

				<main class="main-content col-lg-8 offset-lg-4 container-lg bg-light">
					<div class="title row mt-5 p-3">
                        <div class="col-lg-12">
                            <p>Rejoignez-nous !</p>
                            <h1>Inscription</h1>
                        </div>
                    </div>

					<div v-if="isRedirected == true" class="alert alert-danger">
						<strong>Attention!</strong> Il y a un problème avec vos informations d'inscription
					</div>

					<div class="title row mt-5 p-3">
                        <div class="col-lg-12" v-html="registerForm">
							
                        </div>
                    </div>
					
				</main>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "Register",

	data() {
		return {
			registerForm: null,
			isRedirected: false,
		}
	},

	mounted() {
		this.$http.get('/register')
			.then(result => this.registerForm = result.data)
	},

	created() {
		if(window.location.href.indexOf("?error=1") > -1){
			return this.isRedirected = true
		}else{
			return this.isRedirected = false
		}
	}
};
</script>

<style scoped lang="scss" src="./authentification.scss"></style>