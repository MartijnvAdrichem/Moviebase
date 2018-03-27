<template>
	<div>
		<h1 class="text-center">Register</h1>
		<hr>
		<div class="alert alert-danger" v-if="error && !success">
			<p>There was an error, unable to complete registration.</p>
		</div>
		<div class="alert alert-success" v-if="success">
			<p>Registration completed. You can now <router-link :to="{name:'login'}">sign in.</router-link></p>
		</div>
		<form autocomplete="off" @submit.prevent="register2" v-if="!success" method="post">

			<div class="form-group" v-bind:class="{ 'has-error': error && errors.name }">
				<label for="name">Name</label>
				<input type="text" id="name" class="form-control" v-model="name" required>
				<span class="help-block" v-if="error && errors.name">{{ errors.name }}</span>
			</div>
			<div class="form-group" v-bind:class="{ 'has-error': error && errors.email }">
				<label for="email">E-mail</label>
				<input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
				<span class="help-block" v-if="error && errors.email">{{ errors.email }}</span>
			</div>
			<div class="form-group" v-bind:class="{ 'has-error': error && errors.password }">
				<label for="password">Password</label>
				<input type="password" id="password" class="form-control" v-model="password" required>
				<span class="help-block" v-if="error && errors.password">{{ errors.password }}</span>
			</div>
			<button type="submit" class="btn btn-dark">Submit</button>
		</form>
	</div>
</template>

<script>
	import axios from 'axios';

	export default {
		data(){
			return {
				name: '',
				email: '',
				password: '',
				error: false,
				errors: {},
				success: false
			};
		},
		methods: {
			register2(){
				const params = {
						name: this.name,
						email: this.email,
						password: this.password
					};
				axios.post('/auth/register', params)
					.then(res => console.log(res))
					.catch(error => console.log(error));
			}
		}
	}
</script>
