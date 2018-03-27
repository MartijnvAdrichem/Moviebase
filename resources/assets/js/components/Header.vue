<template>
	<div style="padding-top: 20px" class="offset-md-3 col-md-auto">

		<div class="offset-md-2">
			<img src="/images/Moviebaselogo.png" alt="Logo">
		</div>

		<nav  class="navbar navbar-custom navbar-expand-lg navbar-light bg-warning ml-3 mr-3" id="navbarHeader">

			<div class="row" style="padding-left: 50px; padding-right: 50px">
				<form  class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">S</button>
				</form>
			</div>

			<div class="collapse navbar-collapse row">
				<ul class="navbar-nav">
					<router-link tag="li" v-if="!$auth.check()" to="/login" class="nav-link" active-class="active">
						Movies
					</router-link>
					<router-link tag="li" v-if="!$auth.check()" to="/login" class="nav-link" active-class="active">
						Actors
					</router-link>
					<router-link tag="li" v-if="!$auth.check()" to="/login" class="nav-link" active-class="active">
						Login
					</router-link>
					<router-link tag="li" v-if="!$auth.check()" to="/register" class="nav-link" active-class="active">
						Register
					</router-link>
					<router-link tag="li" v-if="$auth.check()" to="/dashboard" class="nav-link" active-class="active">
						My profile
					</router-link>
					<router-link tag="li" v-if="$auth.check()" to="/" @click.prevent="$auth.logout()" class="nav-link" active-class="active">
						Login
					</router-link>
				</ul>
			</div>
		</nav>
	</div>
</template>

<script>
	export default {
		name: "header"
	}
</script>

<style scoped>

</style>