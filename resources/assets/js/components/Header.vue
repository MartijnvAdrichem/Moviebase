<template>
		<div style="padding-top: 20px">
			<div class="text-center">
				<img src="images/Moviebaselogo.png" alt="">
			</div>
			<div>
				<nav class="navbar navbar-custom navbar-expand-lg navbar-dark bg-dark ml-3 mr-3" >

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav">
								<router-link tag="li" to="/movie/new" class="navbar-text nav-link" active-class="active">
									Movies
								</router-link>
								<router-link tag="li" to="/actor/new" class="navbar-text nav-link" active-class="active">
									Actors
								</router-link>
							<
						</ul>
						<ul class="navbar-nav pull-right ">
							<!--Elements that show when not logged in-->
							<router-link v-if="!$auth.check()" to="/login" class="navbar-text nav-link" active-class="active"><i class="fas fa-sign-in-alt"></i>
								Login
							</router-link>
							<router-link v-if="!$auth.check()" to="/register" class="navbar-text nav-link" active-class="active">
								Register
							</router-link>

							<!--Elements that show when a user is logged in-->
							<router-link v-if="$auth.check()" to="/dashboard" class="navbar-text nav-link" active-class="active">
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
	</div>
</template>

<script>
	export default {
		name: "header"
	}
</script>

<style scoped>

</style>