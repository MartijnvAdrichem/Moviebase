<template>
	<div>

		<div v-if="loading">Loading...</div>
		<div v-else>
		<h1 >{{movie.title}}</h1>
		<div class="row">
			<div class="col-md-6"><app-image :src="movie.mainphoto"></app-image></div>
			<div class="col-md-6">sdjfuisdjf</div>
		</div>
		<p>{{movie.description}}</p>

		<!--<img v-for="photo in movie.photos" :src="'/images/' + photo.path" alt="">-->
		<p v-for="genre in movie.genre"> {{genre.name}}</p>
		<carousel :per-page="1" :navigationEnabled="true" :mouse-drag="false">
			<slide v-for="photo in movie.photos">
				<!--<app-image :src="photo.path"></app-image>-->
				<img style="min-height: 100%; height: 100%" class="img-responsive center-block" :src="'/images/' + photo.path" alt="">
			</slide>
		</carousel>

		<!--<img :src="movie.mainphoto" alt="">-->
		</div>
	</div>
</template>

<script>
	import axios from 'axios';

	export default {
		data() {
			return {
				id: 86,
				loading: true,
				movie: {
					title: "",
					description: "",
					mainphoto: "1522683964_5ac2503ca7488.png",
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
			}
		},
		beforeCreate(){
			this.id = 86;
		},
		created(){
			axios.get('/movie/' + this.id).then( response => {
				console.log(response);
				const data = response.data;
				this.movie = data;
				this.movie.mainphoto = "test.jpg";
				// const resultArray = [];
				// // for (let key in data) {
				// // 	resultArray.push(data[key]);
				// // }
				// this.allActors = resultArray;
				console.log("movie data: " + JSON.stringify(this.movie));
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
			axios.get('/movie/' + this.id + "/photos").then( response => {
				console.log(response);
				const data = response.data;
				const resultArray = [];
				for (let key in data) {
					console.log(data[key]);
					resultArray.push(data[key]);
				}
				this.movie.photos = resultArray;
				console.log("photos"  + JSON.stringify(this.movie.photos))
				this.loading = false;
			});

		},
		methods: {
			addActorRoleRow(actor_id, role){
				this.actor_id++;
				const id = this.actor_id;
				this.movie.cast.push({id: id, actor_id: actor_id, role: role});
				console.log(JSON.stringify(this.movie.cast));
			},
		},
		name: "detail-movie"
	}
</script>

<style scoped>
	.VueCarousel-slide {
		position: relative;
		background-image: url("/images/background.PNG");
		/*background: #f8f9fa;*/
		color: #fff;
		font-family: Arial;
		font-size: 24px;
		text-align: center;
		min-height: 100px;
	}

	.photo {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
	}
</style>