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
			<hr>
			<h2>Cast</h2>
			<div>
				<app-create-actor-movie-row v-for="(castrow) in cast"  :index="castrow.id" :Actors="allActors"></app-create-actor-movie-row>
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
				allActors: [],
				id: 0
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
				console.log(data);
				this.cast.splice(this.cast.indexOf(this.cast.find((row) => {
					return row.id === data.id;
				})), 1);
				this.cast.push({id: data.id, actor_id: data.actor, role: data.role});
				console.log("The cast is" + JSON.stringify(this.cast))
			})
		},
		methods:{
			addActorRoleRow(){
				this.id++;
				const id = this.id;
				this.cast.push({id: id, actor_id: '', role: ''});

			},
			createMovie(){

				let localCast = [];
				console.log(this.cast.length);
				this.cast.forEach((castrow) => {
					console.log(castrow);
					localCast.push({actor_id: castrow.actor_id, role: castrow.role});
				});

				console.log("local" + JSON.stringify(localCast));

				const params = {
					title: this.title,
					description: this.description,
					runTime: this.runTime,
					releaseDate: this.releaseDate,
					storyLine: this.storyLine,
					language: this.language,
					genre: this.genre,
					cast: localCast
				};
				console.log(params);
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