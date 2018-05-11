<template>
	<div>
		<div class="center-block row">
			<router-link tag="h1" to="/movie" class="text-center nav-link">Movies</router-link>
			<dashboard-movie-item class="col-md-3 col-lg-3 col-sm-6"v-for="movie in movies" :movie="movie"></dashboard-movie-item>
		</div>
		<div class="row"></div>
		<hr>
		<div class="row"></div>
		<div class="center-block row">
			<router-link tag="h1" to="/actor" class="text-center nav-link">Actors</router-link>
			<div class="row">
				<dashboard-actor-item class="col-md-3"v-for="actor in actors" :actor="actor"></dashboard-actor-item>
			</div>
		</div>
	</div>
</template>

<script>
	import axios from 'axios';
	import DashboardMovieItem from '../components/dashboard/DashboardMovieItem.vue'
	import DashboardActorItem from '../components/dashboard/DashboardActorItem.vue'

	export default {
		data() {
			return {
				movies:[],
				actors:[]
			}
		},

		beforeCreate(){
			axios.get('/movie/random/4').then( response => {
				console.log(response);
				const data = response.data;
				const resultArray = [];
				for (let key in data) {
					resultArray.push(data[key]);
				}
				this.movies = resultArray;
			});
			axios.get('/actor/random/4').then( response => {
				console.log(response);
				const data = response.data;
				const resultArray = [];
				for (let key in data) {
					resultArray.push(data[key]);
				}
				this.actors = resultArray;
			});
		},
		components: {
			DashboardMovieItem: DashboardMovieItem,
			DashboardActorItem: DashboardActorItem
		},

		name: "dashboard"
	}
</script>

<style scoped>

</style>