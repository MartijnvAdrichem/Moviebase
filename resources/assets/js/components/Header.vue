<template>
		<div style="padding-top: 20px">

			<nav  class="navbar navbar-custom navbar-expand-lg navbar-dark bg-dark ml-3 mr-3" id="navbarHeader">

				<div style="padding-left: 50px; padding-right: 50px">
					<form  class="form-inline my-2 my-lg-0">
						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">S</button>
					</form></div>


				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="#">Movies</a>
						</li>
						<li class="nav-item">
						<a class="nav-link disabled" href="#">Actors</a>
					</li>
				</ul>
	<ul class="navbar-nav">
		<!--Elements that show when not logged in-->
		<router-link v-if="!$auth.check()" to="/login" class="navbar-text nav-link" active-class="active"><i class="fas fa-sign-in-alt"></i>
			Login
		</router-link>
		<router-link v-if="!$auth.check()" to="/register" class="navbar-text nav-link" active-class="active">
			Register
		</router-link>

		<!--Elements that show when a user is logged in-->
		<router-link v-if="$auth.check()" to="/dashboard" class="navbar-text nav-link" active-class="active">
			<i class="fas fa-fire"></i>
			profile
		</router-link>
		<li v-if="$auth.check()" class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
			   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i>
				{{$auth.user().firstname}}
			</a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
				<router-link class="dropdown-item" tag="a" to="/user/profile">Profile</router-link>
				<router-link class="dropdown-item" tag="a" to="/user/account">Account Settings</router-link>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#">Something else here</a>
			</div>
		</li>
		<li v-if="$auth.check()" @click.prevent="logout"><a href="/" class="nav-link"><i
				class="fas fa-sign-out-alt"></i> Logout</a></li>
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