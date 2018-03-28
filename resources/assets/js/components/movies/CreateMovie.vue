<template>
	<div>


		<h1 class="text-center">New movie</h1>
		<hr>
		<form autocomplete="off" @submit.prevent="createMovie" methods="post">

			<div class="form-group" v-bind:class="{invalid: $v.title.$error}">
				<label for="title">Title</label>
				<input @blur="$v.title.$touch()" type="text" id="title" class="form-control" v-model="title" required>
				<p v-if="!$v.title.required">This field must not be empty</p>
			</div>

			<div class="form-group" v-bind:class="{invalid: $v.description.$error}">
				<label for="description">Description</label>
				<input @blur="$v.description.$touch()" type="text" id="description" class="form-control" v-model="description" required>
				<p v-if="!$v.description.required">This field must not be empty</p>
			</div>

			<div class="form-group" v-bind:class="{invalid: $v.runTime.$error}">
				<label for="runTime">Run time (in min)</label>
				<input @blur="$v.runTime.$touch()" type="text" id="runTime" class="form-control" v-model="runTime" required>
				<p v-if="!$v.runTime.required">This field must not be empty</p>
			</div>

			<div class="form-group" v-bind:class="{invalid: $v.releaseDate.$error}">
				<label for="releaseDate">Release date</label>
				<input @blur="$v.releaseDate.$touch()" type="text" id="releaseDate" class="form-control" v-model="releaseDate" required>
				<p v-if="!$v.releaseDate.required">This field must not be empty</p>
			</div>

			<div class="form-group" v-bind:class="{invalid: $v.storyLine.$error}">
				<label for="storyLine">Story</label>
				<input @blur="$v.storyLine.$touch()" type="text" id="storyLine" class="form-control" v-model="storyLine" required>
				<p v-if="!$v.storyLine.required">This field must not be empty</p>
			</div>

			<div class="checkbox-inline" v-bind:class="{invalid: $v.genre.$error}">
					<label v-for="genre1 in allGenres" class="checkbox-inline"><input @change="$v.genre.$touch()" type="checkbox" :value="genre1.id" v-model="genre"> {{genre1.name}}</label>
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
				title: "",
				description: "",
				runTime: "",
				releaseDate: "",
				genre: [],
				photos: [],
				videos: [],
				cast: [],
				company: [],
				storyLine: "",
				language: "",

				allGenres: [],
			}
		},
		beforeCreate(){
			axios.get('/genre/all').then( response => {
				const data = response.data;
				const resultArray = [];
				for (let key in data) {
					resultArray.push(data[key]);
				}
				this.allGenres = resultArray;
				console.log(this.allGenres);
			});
		},
		methods:{
			createMovie(){
				const params = {
					title: this.title,
					description: this.description,
					runTime: this.runTime,
					releaseDate: this.releaseDate,
					storyLine: this.storyLine,
					language: this.language,
					genre: this.genre
				};
				axios.post('/movie/create', params)
					.then(res => console.log(res))
					.catch(error => console.log(error));
			}
		},

		validations: {
			title: {
				required,
			},
			description: {
				required,
			},
			runTime: {
				required,
			},
			releaseDate: {
				required,
			},
			genre: {

			},
			photos: {

			},
			videos: {

			},
			cast: {

			},
			company: {

			},
			storyLine: {
				required,
			},
			language: {

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