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
		}
	},

	mounted() {
		this.$http.get('/api/register')
			.then(result => this.registerForm = result.data)
		}
};
</script>

<style scoped lang="scss" src="./authentification.scss"></style>