<template>
	<div>

		<div v-if="loading">Loading...</div>
		<div v-else>
			<h1 >{{movie.title}} ( {{movie.releaseDate | formatDate }} )</h1>
			<div class="row">
				<p>Run time {{movie.runTime | minToHour}} | <span><span v-for="(genre, index) in movie.genres">{{genre.name}}<span v-if="index != Object.keys(movie.genres).length - 1">, </span></span></span> | </p>

					<star-rating
							style="margin-left: 20px; margin-top: -10px; margin-right: 20px"
					v-bind:increment="0.1"
					v-bind:max-rating="5"
					v-model="rating"
					inactive-color="#000"
					active-color="#E4BB24"
					v-bind:star-size="20"
					:read-only = true
					></star-rating>
				| Total reviews: {{movie.reviews.length}}
			</div>
		<hr>
		<div class="row">
			<div class="col-md-4"><app-image style="min-height: 300px; max-height: 300px" :src="movie.mainphoto"></app-image></div>
			<div class="col-md-8"><youtube player-height="300" player-width="500" video-id="dQw4w9WgXcQ"></youtube></div>
		</div>

<div class="row">

		<p>{{movie.description}}</p>
</div>
			<div v-if="movie.photos" class="row">
		<!--<img v-for="photo in movie.photos" :src="'/images/' + photo.path" alt="">-->
		<carousel :per-page="1" :navigationEnabled="true" :mouse-drag="false">
			<slide v-for="photo in movie.photos" :key="photo.id">
				<!--<app-image :src="photo.path"></app-image>-->
				<img style="min-height: 100%; height: 100%" class="img-responsive center-block" :src="'/images/' + photo.path" alt="Photo">
			</slide>
		</carousel>
			</div>
			<div v-if="movie.cast" class="row">
		<carousel :per-page="10" :navigationEnabled="true" :mouse-drag="false">
			<slide v-for="actor in movie.cast" :key="actor.id">
				<!--<app-image :src="photo.path"></app-image>-->
				<img style="min-height: 100%; height: 100%" class="img-responsive center-block" :src="'/images/' + actor.photo" alt="">
			</slide>
		</carousel>
			</div>
			<hr>

		<!--<img :src="movie.mainphoto" alt="">-->
			<div class="row col-md-12">
				<h2>User reviews</h2>
				<div style="margin-bottom: 20px" class="card col-md-12" v-for="review in movie.reviews" >
					<detail-review class="row col-md-12" :review="review"></detail-review>

				</div>

			</div>

			<div class="row col-md-12">
				<create-review :movie_id="id"></create-review>
			</div>
		</div>
	</div>
</template>

<script>
	import axios from 'axios';
	import CreateReview from '../reviews/CreateReview.vue';
	import DetailReview from '../reviews/DetailReview.vue';

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
					genres: [],
					reviews: [],
					photos: [],
					videos: [],
					cast: [],
					company: [],
					storyLine: "",
					language: "",
				},
			}
		},
		computed:{
			rating() {
				if(this.movie.reviews){
					let totalRating = 0;
					this.movie.reviews.forEach((review) => {
						totalRating +=  Number(review.rating);
						console.log(totalRating)
					});
					return totalRating / this.movie.reviews.length;
				}
			}
		},
		beforeCreate(){
			this.id = 86;
			console.log(this.id);
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
				console.log("Genre data" +  this.movie.genres)
				this.loading = false;
			});
		},
		created(){

		},
		methods: {
			addActorRoleRow(actor_id, role){
				this.actor_id++;
				const id = this.actor_id;
				this.movie.cast.push({id: id, actor_id: actor_id, role: role});
				console.log(JSON.stringify(this.movie.cast));
			},
		},
		components: {
			createReview: CreateReview,
			detailReview: DetailReview,
		},
		name: "detail-movie"
	}
</script>

<style scoped>
	.VueCarousel-slide {
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