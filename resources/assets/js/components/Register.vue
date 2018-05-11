<template>
	<div>
		<h1 class="text-center">Register</h1>
		<hr>
		<div class="alert alert-danger" v-if="error && !success">
			<p>There was an error, unable to complete registration.</p>
		</div>
		<form autocomplete="off" @submit.prevent="register2" v-if="!success" method="post">

			<div class="form-group" v-bind:class="{invalid: $v.name.$error}">
				<label for="name">Name</label>
				<input @blur="$v.name.$touch()" type="text" id="name" class="form-control" v-model="name" required>
				<p v-if="!$v.name.required">This field must not be empty</p>
				<p v-if="!$v.name.maxLen">This field cant have more than 300 characters</p>
			</div>
			<div class="form-group" v-bind:class="{invalid: $v.email.$error}">
				<label for="email">Email</label>
				<input @blur="$v.email.$touch()" type="text" id="email" class="form-control" v-model="email" required>
				<p v-if="!$v.email.required">This field must not be empty</p>
				<p v-if="!$v.email.maxLen">This field cant have more than 300 characters</p>
				<p v-if="!$v.email.email">This field must be in an email format</p>
			</div>
			<div class="form-group" v-bind:class="{invalid: $v.password.$error}">
				<label for="description">Password</label>
				<input @blur="$v.password.$touch()" type="password" id="description" class="form-control" v-model="password" required>
				<p v-if="!$v.password.required">This field must not be empty</p>
				<p v-if="!$v.password.maxLen">This field cant have more than 300 characters</p>
				<p v-if="!$v.password.minLen">This field must be atleast 6 characters</p>
			</div>
			<button type="submit" class="btn btn-dark">Submit</button>
		</form>
	</div>
</template>

<script>
	import axios from 'axios';
	import {required, email, numeric, minValue, minLength, maxLength, sameAs, requiredUnless } from 'vuelidate/lib/validators';

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
					.then(res => this.$router.push('login')  )
					.catch(error => console.log("error"));
			}
		},
		validations: {
			name: {
				required,
				maxLen: maxLength(50)
			},
			password: {
				required,
				minLen: minLength(6),
				maxLen: maxLength(50)
			},
			email: {
				required,
				email,
				maxLen: maxLength(50)
			},
		}
	}
</script>

<style scoped>
	.invalid {
		border: 1px solid red;
		background-color: #ffc9aa
	}

</style>