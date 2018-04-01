<template>
	<div>
		<h1 class="text-center">Edit movie {{movie.title}} {{movie.id}}</h1>
		<hr>
		<form autocomplete="off" @submit.prevent="createMovie" methods="post">

			<div class="form-group" v-bind:class="{invalid: $v.movie.title.$error}">
				<label for="title">Title</label>
				<input @blur="$v.movie.title.$touch()" type="text" id="title" class="form-control" v-model="movie.title" required>
				<p v-if="!$v.movie.title.required">This field must not be empty</p>
			</div>

			<div class="form-group" v-bind:class="{invalid: $v.movie.description.$error}">
				<label for="description">Description</label>
				<input @blur="$v.movie.description.$touch()" type="text" id="description" class="form-control" v-model="movie.description" required>
				<p v-if="!$v.movie.description.required">This field must not be empty</p>
			</div>

			<div class="form-group" v-bind:class="{invalid: $v.movie.runTime.$error}">
				<label for="runTime">Run time (in min)</label>
				<input @blur="$v.movie.runTime.$touch()" type="text" id="runTime" class="form-control" v-model="movie.runTime" required>
				<p v-if="!$v.movie.runTime.required">This field must not be empty</p>
			</div>

			<div class="form-group" v-bind:class="{invalid: $v.movie.releaseDate.$error}">
				<label for="releaseDate">Release date</label>
				<input @blur="$v.movie.releaseDate.$touch()" type="text" id="releaseDate" class="form-control" v-model="movie.releaseDate" required>
				<p v-if="!$v.movie.releaseDate.required">This field must not be empty</p>
			</div>

			<div class="form-group" v-bind:class="{invalid: $v.movie.storyLine.$error}">
				<label for="storyLine">Story</label>
				<input @blur="$v.movie.storyLine.$touch()" type="text" id="storyLine" class="form-control" v-model="movie.storyLine" required>
				<p v-if="!$v.movie.storyLine.required">This field must not be empty</p>
			</div>

			<div class="checkbox-inline" v-bind:class="{invalid: $v.movie.genre.$error}">
				<label v-for="genre1 in allGenres" class="checkbox-inline"><input @change="$v.movie.genre.$touch()" type="checkbox" :value="genre1.id" v-model="movie.genre"> {{genre1.name}}</label>
			</div>
			<hr>
			<h2>Cast</h2>
			<div>
				<app-create-actor-movie-row v-for="(castrow) in movie.cast"  :actor1="castrow.actor_id" :role1="castrow.role" :index="castrow.id" :Actors="allActors"></app-create-actor-movie-row>
			</div>
			<button class="btn btn-dark" @click.prevent="addActorRoleRow">Add row</button>
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
	import {required, email, numeric, minValue, minLength, sameAs, requiredUnless} from 'vuelidate/lib/validators';
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
					videos: [],
					cast: [],
					company: [],
					storyLine: "",
					language: "",
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


			axios.get('/movie/' + this.id).then( response => {
				console.log(response);
				const data = response.data;
				this.movie = data;
				// const resultArray = [];
				// // for (let key in data) {
				// // 	resultArray.push(data[key]);
				// // }
				// this.allActors = resultArray;
				console.log("movie data: " + JSON.stringify(this.allActors));
			});
			axios.get('/movie/' + this.id + "/cast").then( response => {
				this.movie.cast = [];
				console.log(response);
				const data = response.data;
				for (let key in data) {
					this.addActorRoleRow(data[key].id, data[key].role);
				}
				console.log("cast data " + JSON.stringify(this.movie.cast));
			});

			axios.get('/movie/' + this.id + "/genres").then( response => {
				console.log(response);
				const data = response.data;
				const resultArray = [];
				for (let key in data) {
					resultArray.push(data[key].id);
				}
				this.movie.genre = resultArray;
			});

			eventBus.$on('actorWasEditted', (data) => {
				console.log(data);
				this.movie.cast.splice(this.movie.cast.indexOf(this.movie.cast.find((row) => {
					return row.id === data.id;
				})), 1);
				this.movie.cast.push({id: data.id, actor_id: data.actor, role: data.role});
				console.log("The cast is" + JSON.stringify(this.movie.cast))
			})
		},
		methods:{
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
				console.log(this.movie.cast.length);
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
					cast: localCast
				};
				console.log(params);
				axios.put('/movie/edit/'+ this.movie.id, params)
					.then(res => console.log(res))
					.catch(error => console.log(error));
			}
		},

		validations: {
			movie: {
				title: {
					required,
				},
				description: {

				},
				runTime: {

				},
				releaseDate: {

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
				},
				language: {

				}
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