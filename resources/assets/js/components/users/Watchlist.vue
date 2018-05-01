<template>
	<div>
		<h1>My watchlist</h1>
		<hr>
		<ul class="list-group">
			<router-link tag="li" class="list-group-item" v-for="movie in watchlist"  :key="movie.id" active-class="active" :to="{path: '/movie/' + movie.id}"><a style="font-size: 1.2em;">{{movie.title}}</a>
				<button class="btn btn-danger pull-right" @click="removeMovieFromWatchlist(movie)">Remove</button></router-link>
		</ul>
	</div>
</template>

<script>
	import axios from 'axios';

	export default {
		name: "watchlist",

		data(){
			return{
				watchlist: {

				}
			}
		},
		beforeCreate(){
			axios.get('/user/watchlist').then( response => {
				this.watchlist = response.data;
			});
		},
		methods: {
			removeMovieFromWatchlist(movie){
				axios.post('user/watchlist/remove/' + movie.id)
					.then(res => this.watchlist.splice(this.watchlist.indexOf(movie), 1))
					.catch(error => console.log(error));
			},
		}

	}
</script>

<style scoped>

</style>