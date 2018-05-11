<template>
	<div>
		<h1 class="text-center">Create movie</h1>
		<hr>
		<form autocomplete="off" @submit.prevent="createMovie" methods="post">

			<div class="form-group" v-bind:class="{invalid: $v.movie.title.$error}">
				<label for="title">Title</label>
				<input @blur="$v.movie.title.$touch()" type="text" id="title" class="form-control" v-model="movie.title" required>
				<p v-if="!$v.movie.title.required">This field must not be empty</p>
				<p v-if="!$v.movie.title.maxLen">This field cant have more than 50 characters</p>
			</div>

			<div class="form-group" v-bind:class="{invalid: $v.movie.description.$error}">
				<label for="description">Description</label>
				<input @blur="$v.movie.description.$touch()" type="text" id="description" class="form-control" v-model="movie.description" required>
				<p v-if="!$v.movie.description.required">This field must not be empty</p>
				<p v-if="!$v.movie.description.maxLen">This field cant have more than 300 characters</p>
			</div>

			<div class="row">
				<div class="form-group col-md-6" v-bind:class="{invalid: $v.movie.runTime.$error}">
					<label for="runTime">Run time (in min)</label>
					<input @blur="$v.movie.runTime.$touch()" type="text" id="runTime" class="form-control" v-model="movie.runTime" required>
					<p v-if="!$v.movie.runTime.required">This field must not be empty</p>
					<p v-if="!$v.movie.runTime.numeric">This field must be a number</p>
				</div>

				<div class="form-group col-md-6" v-bind:class="{invalid: $v.movie.releaseDate.$error}">
					<label for="releaseDate">Release date</label>
					<input @blur="$v.movie.releaseDate.$touch()" type="text" id="releaseDate" class="form-control" v-model="movie.releaseDate" required>
					<p v-if="!$v.movie.releaseDate.required">This field must not be empty</p>
				</div>
			</div>



			<div class="form-group" v-bind:class="{invalid: $v.movie.storyLine.$error}">
				<label for="storyLine">Story</label>
				<textarea rows="4" @blur="$v.movie.storyLine.$touch()" type="text" id="storyLine" class="form-control" v-model="movie.storyLine" required></textarea>
				<p v-if="!$v.movie.storyLine.required">This field must not be empty</p>
				<p v-if="!$v.movie.storyLine.maxLen">This field cant have more than 2500 characters</p>
			</div>

			<div class="form-group" v-bind:class="{invalid: $v.movie.video.$error}">
				<label for="video">Trailer</label>
				<p>put the youtube video id ex: https://www.youtube.com/watch?v=dQw4w9WgXcQ -> video id = dQw4w9WgXcQ </p>
				<input @blur="$v.movie.video.$touch()" type="text" id="video" class="form-control" v-model="movie.video">
			</div>

			<hr>
			<h2>Movie photos</h2>
			<label>Main photo</label>
			<input type="file" @change="createMainImage">
			<label>Other photos</label>
			<input type="file" multiple @change="onFileChange">
			<div class="row">
					<div v-for="photo in movie.photos" class="col-md-3">
						<button type="button" class="close" @click="deleteImage(photo)" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<img  style="padding: 3px"class="img-responsive" :src="photo" alt="">
					</div>
			</div>
			<hr style="padding-top: 5px">
			<div class="row">
			<div class="checkbox-inline col-md-6" v-bind:class="{invalid: $v.movie.genre.$error}">
				<label v-for="genre1 in allGenres" class="checkbox-inline"><input @change="$v.movie.genre.$touch()" type="checkbox" :value="genre1.id" v-model="movie.genre"> {{genre1.name}}</label>
			</div>
			</div>
			<hr style="padding-top: 5px">
			<h2>Cast</h2>
			<div>
				<app-create-actor-movie-row v-for="(castrow) in movie.cast"  :key="castrow.id" :actor1="castrow.actor_id" :role1="castrow.role" :index="castrow.id" :Actors="allActors"></app-create-actor-movie-row>
			</div>
			<button class="btn btn-dark" @click.prevent="addActorRoleRow">Add row</button>
			<hr>
			<div class="submit">
				<button class="btn btn-dark" type="submit" :disabled="$v.$invalid">Submit</button>
			</div>
		</form>
	</div>
</template>

<script>

	import axios from 'axios';
	import {eventBus} from '../../app.js'
	import CreateActorMovieRow from './CreateActorMovieRow.vue';
	import {required, email, numeric, minValue, minLength, maxLength, sameAs, requiredUnless } from 'vuelidate/lib/validators';
	export default {
		props: ['id'],

		data() {
			return {
				movie: {
					title: "",
					description: "",
					runTime: "",
					releaseDate: "",
					genre: [],
					photos: [],
					video: "",
					cast: [],
					company: [],
					storyLine: "",
					language: "",
					mainphoto: "",
				},

				allGenres: [],
				allActors: [],
				actor_id: 0
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
			axios.get('/actor/all').then( response => {
				const data = response.data;
				const resultArray = [];
				for (let key in data) {
					resultArray.push(data[key]);
				}
				this.allActors = resultArray;
				console.log("all actors: " + this.allActors);
			});

		},
		created() {

			eventBus.$on('actorWasEditted', (data) => {
				let index = this.movie.cast.indexOf(this.movie.cast.find((row) => {
					return row.id === data.id;
				}));

				this.movie.cast[index].id = data.id;
				this.movie.cast[index].actor_id = data.actor;
				this.movie.cast[index].role = data.role;
			})
		},
		methods:{
			onFileChange(e) {
				let files = e.target.files || e.dataTransfer.files;
				if (!files.length) {
					console.log("buh");
					return;
				}
				console.log(files);
				console.log(files.length);
				for(let i = 0; i < files.length; i++) {
					this.createImage(files[i]);
				}
			},
			createImage(file) {
				let reader = new FileReader();
				let vm = this;
				reader.onload = (e) => {
					vm.movie.photos.push(e.target.result);
				};
				reader.readAsDataURL(file);
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
			deleteImage(photo){
				console.log(photo);
				this.movie.photos.splice(this.movie.photos.indexOf(photo), 1);
			},
			addActorRoleRow(){
				this.actor_id++;
				const id = this.actor_id;
				this.movie.cast.push({id: id, actor_id: '', role: ''});

			},
			addActorRoleRow(actor_id, role){
				this.actor_id++;
				const id = this.actor_id;
				this.movie.cast.push({id: id, actor_id: actor_id, role: role});
				console.log(JSON.stringify(this.movie.cast));
			},
			createMovie(){

				let localCast = [];
				this.movie.cast.forEach((castrow) => {
					console.log(castrow);
					localCast.push({actor_id: castrow.actor_id, role: castrow.role});
				});

				console.log("local" + JSON.stringify(localCast));

				const params = {
					title: this.movie.title,
					description: this.movie.description,
					runTime: this.movie.runTime,
					releaseDate: this.movie.releaseDate,
					storyLine: this.movie.storyLine,
					language: this.movie.language,
					genre: this.movie.genre,
					cast: localCast,
					photos: this.movie.photos,
					video: this.movie.video,
					mainPhoto: this.movie.mainphoto,
				};
				console.log(params);
				axios.post('/movie/create', params)
					.then(res => this.$router.push('/movie'))
					.catch(error => console.log("error"));
			}
		},

		validations: {
			movie: {
				title: {
					required,
					maxLen: maxLength(50)
				},
				description: {
					required,
					maxLen: maxLength(300)
				},
				runTime: {
					required,
					numeric

				},
				releaseDate: {
					required
				},
				genre: {

				},
				photos: {

				},
				video: {

				},
				cast: {

				},
				storyLine: {
					required,
					maxLen: maxLength(2500)

				},
			}
		},
		components: {
			AppCreateActorMovieRow:CreateActorMovieRow
		}
	}
</script>

<style scoped>
	.invalid {
		border: 1px solid red;
		background-color: #ffc9aa
	}

</style>