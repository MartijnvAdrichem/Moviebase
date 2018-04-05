<template>
	<ul class="">
		<router-link tag="li" v-for="movie in allMovies"  active-class="active" :to="{path: '/movie/' + movie.id}"><a>{{movie.title}}</a></router-link>
	</ul>
</template>

<script>
	import CreateMovie from './CreateMovie.vue';
	import axios from 'axios';

	export default {
		data() {
			return{
				allMovies: [],
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