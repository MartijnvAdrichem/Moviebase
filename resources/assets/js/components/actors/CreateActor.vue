<template>
	<div>


		<h1 class="text-center">New Actor</h1>
		<hr>
		<form autocomplete="off" @submit.prevent="createActor" methods="post">

			<div class="form-group" v-bind:class="{invalid: $v.firstname.$error}">
				<label for="firstname">Firstname</label>
				<input @blur="$v.firstname.$touch()" type="text" id="firstname" class="form-control" v-model="firstname" required>
				<p v-if="!$v.firstname.required">This field must not be empty</p>
			</div>

			<div class="form-group" v-bind:class="{invalid: $v.prefix.$error}">
				<label for="prefix">Prefix</label>
				<input @blur="$v.prefix.$touch()" type="text" id="prefix" class="form-control" v-model="prefix" required>
				<p v-if="!$v.prefix.required">This field must not be empty</p>
			</div>

			<div class="form-group" v-bind:class="{invalid: $v.lastname.$error}">
				<label for="lastname">Lastname</label>
				<input @blur="$v.lastname.$touch()" type="text" id="lastname" class="form-control" v-model="lastname" required>
				<p v-if="!$v.lastname.required">This field must not be empty</p>
			</div>

			<div class="form-group" v-bind:class="{invalid: $v.biography.$error}">
				<label for="biography">Biography</label>
				<input @blur="$v.biography.$touch()" type="text" id="biography" class="form-control" v-model="biography" required>
				<p v-if="!$v.biography.required">This field must not be empty</p>
			</div>

			<div class="form-group" v-bind:class="{invalid: $v.birthday.$error}">
				<label for="birthday">Birthday</label>
				<input @blur="$v.birthday.$touch()" type="text" id="birthday" class="form-control" v-model="birthday" required>
				<p v-if="!$v.birthday.required">This field must not be empty</p>
			</div>
			<div class="form-group" v-bind:class="{invalid: $v.profilePhoto.$error}">
				<label for="birthday">Profile picture</label>
				<input type="file" @change="createMainImage">
				<p v-if="!$v.profilePhoto.required">This field must not be empty</p>
			</div>



			<div class="submit">
				<button class="btn btn-dark" type="submit" :disabled="$v.$invalid">Submit</button>
			</div>
		</form>
	</div>
</template>

<script>
	import axios from 'axios';
	import {required, email, numeric, minValue, minLength, sameAs, requiredUnless} from 'vuelidate/lib/validators';

	export default {
		data() {
			return {
				firstname: "",
				prefix: "",
				lastname: "",
				biography: "",
				birthday: "",
				profilePhoto: "",
				photos: []
			}
		},
		beforeCreate(){

		},
		methods:{
			createActor(){
				const params = {
					firstname: this.firstname,
					prefix: this.prefix,
					lastname: this.lastname,
					biography: this.biography,
					birthday: this.birthday,
					profilephoto: this.profilePhoto,
					photos: this.photos
				};

				axios.post('/actor/create', params)
					.then(res => console.log(res))
					.catch(error => console.log(error));
			},
			createMainImage(e){
				let file = e.target.files || e.dataTransfer.files;
				if (!file.length) {
					return;
				}
				let reader = new FileReader();
				let vm = this;
				reader.onload = (ev) => {
					vm.movie.mainphoto = ev.target.result;
				};
				reader.readAsDataURL(file[0]);
			},
		},

		validations: {
			firstname: {
				required
			},
			prefix: {

			},
			lastname: {

			},
			biography: {

			},
			birthday:{

			},
			profilePhoto: {

			},
			photos: {

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