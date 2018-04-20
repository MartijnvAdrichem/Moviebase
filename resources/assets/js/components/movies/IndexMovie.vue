<template>
	<div>
		<div class="row">
			<div class="col-md-10">
				<h1>All Movies</h1>
			</div>
			<div class="col-md-2">
				<router-link tag="button" class="btn btn-primary" :to="{path: '/movie/new'}">New Movie</router-link>
			</div>
		</div>
		<input type="text" placeholder="filter" class="form-control" v-model="searchterm">
		<ul class="list-group">
			<router-link tag="li" class="list-group-item" v-for="movie in movies"  :key="movie.id" active-class="active" :to="{path: '/movie/' + movie.id}"><a>{{movie.title}}</a></router-link>
		</ul>
	</div>
</template>

<script>
	import CreateMovie from './CreateMovie.vue';
	import axios from 'axios';

	export default {
		data() {
			return{
				allMovies: [],
				searchterm: ""
			}
		},
		computed: {
			movies() {
				return this.allMovies.filter( (movie) => {
					return movie.title.toLowerCase().match(this.searchterm.toLowerCase())
				})
			}
		},

		name: "index-movie",
		beforeCreate(){
			axios.get('/movies/all').then( response => {
				console.log(response);
				const data = response.data;
				const resultArray = [];
				for (let key in data) {
					resultArray.push(data[key]);
				}
				this.allMovies = resultArray;
			});
		},
		components: {
			appCreateMovie: CreateMovie,
		}
	}
</script>

<style scoped>

</style>