<template>
	<div>


		<h1 class="text-center">Edit Actor</h1>
		<hr>
		<form autocomplete="off" @submit.prevent="createActor" methods="post">

			<div class="form-group" v-bind:class="{invalid: $v.actor.firstname.$error}">
				<label for="firstname">Firstname</label>
				<input @blur="$v.actor.firstname.$touch()" type="text" id="firstname" class="form-control" v-model="actor.firstname" required>
				<p v-if="!$v.actor.firstname.required">This field must not be empty</p>
				<p v-if="!$v.actor.firstname.maxLen">This field cant have more than 30 characters</p>
			</div>

			<div class="form-group" v-bind:class="{invalid: $v.actor.prefix.$error}">
				<label for="prefix">Prefix</label>
				<input @blur="$v.actor.prefix.$touch()" type="text" id="prefix" class="form-control" v-model="actor.prefix">
			</div>

			<div class="form-group" v-bind:class="{invalid: $v.actor.lastname.$error}">
				<label for="lastname">Lastname</label>
				<input @blur="$v.actor.lastname.$touch()" type="text" id="lastname" class="form-control" v-model="actor.lastname" required>
				<p v-if="!$v.actor.lastname.required">This field must not be empty</p>
				<p v-if="!$v.actor.lastname.maxLen">This field cant have more than 30 characters</p>
			</div>

			<div class="form-group" v-bind:class="{invalid: $v.actor.biography.$error}">
				<label for="biography">Biography</label>
				<textarea rows="3" @blur="$v.actor.biography.$touch()" type="text" id="biography" class="form-control" v-model="actor.biography" required></textarea>
				<p v-if="!$v.actor.biography.required">This field must not be empty</p>
				<p v-if="!$v.actor.biography.maxLen">This field cant have more than 2000 characters</p>
			</div>

			<div class="form-group" v-bind:class="{invalid: $v.actor.birthday.$error}">
				<label for="birthday">Birthday</label>
				<input @blur="$v.actor.birthday.$touch()" type="text" id="birthday" class="form-control" v-model="actor.birthday" required>
				<p v-if="!$v.actor.birthday.required">This field must not be empty</p>
			</div>
			<div class="form-group" v-bind:class="{invalid: $v.actor.profilePhoto.$error}">
				<label for="birthday">Profile picture</label>
				<input type="file" @change="createMainImage">
				<p v-if="!$v.actor.profilePhoto.required">This field must not be empty</p>
			</div>



			<div class="submit">
				<button class="btn btn-dark" type="submit" :disabled="$v.actor.$invalid">Update</button>
			</div>
		</form>
	</div>
</template>

<script>
	import axios from 'axios';
	import {required, email, numeric, minValue, maxLength, minLength, sameAs, requiredUnless} from 'vuelidate/lib/validators';

	export default {
		data() {
			return {
				actor: {
					id: 0,
					firstname: "",
					prefix: "",
					lastname: "",
					biography: "",
					birthday: "",
					profilePhoto: "",
				},
			}
		},
		beforeCreate(){
			let id = this.$route.params.id;
			console.log(id);
			axios.get('/actor/' + id).then( response => {
				console.log(response);
				const data = response.data;
				this.actor = data;
				this.actor.profilePhoto = "";
			});
		},
		methods:{
			createActor(){
				let params = {
					firstname: this.actor.firstname,
					prefix: this.actor.prefix,
					lastname: this.actor.lastname,
					biography: this.actor.biography,
					birthday: this.actor.birthday,
				};

				if(this.actor.profilePhoto !== ""){
					params['profilephoto'] = this.actor.profilePhoto;
				}
				axios.put('/actor/edit/' + this.actor.id, params)
					.then(res => this.$router.push('/actor/' + this.actor.id))
					.catch(error => console.log("error"));
			},
			createMainImage(e){
				let file = e.target.files || e.dataTransfer.files;
				if (!file.length) {
					return;
				}
				let reader = new FileReader();
				let vm = this;
				reader.onload = (ev) => {
					vm.actor.profilePhoto = ev.target.result;
				};
				reader.readAsDataURL(file[0]);
			},
		},

		validations: {
			actor: {
				firstname: {
					required,
					maxLen: maxLength(30)
				},
				prefix: {

				},
				lastname: {
					required,
					maxLen: maxLength(30)
				},
				biography: {
					required,
					maxLen: maxLength(2000)
				},
				birthday:{
					required
				},
				profilePhoto: {


				},
			}
		}
	}
</script>

<style scoped>
	.invalid {
		border: 1px solid red;
		background-color: #ffc9aa
	}

</style>