<template>
	<div>

		<div v-if="loading">Loading...</div>
		<div v-else>
			<div class="row">
				<div class="col-md-8">
						<h1>{{movie.title}} ({{movie.releaseDate | formatDate }})</h1>
				</div>
				<div class="col-md-4">
					<router-link v-if="$auth.check()" tag="button" class="pull-right btn btn-primary" :to="{path: '/movie/edit/' + movie.id}">Edit movie</router-link>
					<div v-if="$auth.check()">
						<button v-if="watchlist === 0" style="margin-right: 4px" @click="addMovieToWatchlist" title="Add to watchlist" class="pull-right btn btn-primary"><i class="fas fa-plus"></i></button>
						<button v-if="watchlist === 1" style="margin-right: 4px" @click="removeMovieFromWatchlist" title="Remove from watchlist" class="pull-right btn btn-danger"><i class="fas fa-minus"></i></button>
					</div>
				</div>
			</div>
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
		<div style="margin: 10px;" class="row">
			<div class="col-md-4"><app-image style="min-height: 300px; max-height: 300px" :src="movie.mainphoto"></app-image></div>
			<div class="col-md-8"><youtube player-height="300" player-width="500" :video-id="movie.video"></youtube></div>
		</div>
	
			<div style="margin: 10px;" class="card">
			<div class="card-body">
				<p>{{movie.description}}</p>
			</div>
			</div>
			<div v-if="movie.photos.length > 0">
		<!--<img v-for="photo in movie.photos" :src="'/images/' + photo.path" alt="">-->
		<carousel :per-page="1" :navigationEnabled="true" :mouse-drag="true">
			<slide v-for="photo in movie.photos" :key="photo.id">
				<img style=" max-height: 500px " class="img-responsive center-block" :src="'/images/' + photo.path" alt="Photo">
			</slide>
		</carousel>
			</div>


			<div v-if="movie.actors.length > 0">
				<carousel :per-page="5" :navigationEnabled="true" :mouse-drag="true">
					<slide  v-for="actor in movie.actors" :key="actor.id">
					<router-link style="cursor:pointer;" tag="span" :to="'/actor/' + actor.id">
						<p class=" text-center font-weight-bold">{{actor.pivot.role}}</p>
						<img style="min-height: 100px; height: 100px; min-width: 75px; max-width: 75px;"  class=" rounded-circle img-responsive center-block" :src="actor.profilephoto ? '/images/' + actor.profilephoto : '/images/placeholder_avatar.png'" alt="">
						<p class="text-center font-weight-bold" >{{actor.firstname}} {{actor.prefix ? actor.prefix : ""}} {{actor.lastname}}</p>
					</router-link>
					</slide>
				</carousel>
			</div>
			<hr>
			<div class="textblock row col-md-12">
				<h2>Story</h2>
				<div class="row col-md-12">
					{{movie.storyLine}}
				</div>
			</div>
		<!--<img :src="movie.mainphoto" alt="">-->
			<div class="row col-md-12">
				<h2>User reviews</h2>

				<div class="row col-md-12" v-if="movie.reviews.length == 0">
					<p>There are no reviews yet!</p>
				</div>

				<div style="margin-bottom: 20px" class="card col-md-12" v-for="review in movie.reviews" >
					<detail-review class="row col-md-12" :review="review"></detail-review>

				</div>

			</div>

			<div class="row col-md-12">
				<create-review :movie_id="movie.id"></create-review>
			</div>
		</div>
	</div>
</template>

<script>
	import axios from 'axios';
	import CreateReview from '../reviews/CreateReview.vue';
	import DetailReview from '../reviews/DetailReview.vue';
	import {eventBus} from '../../app.js'

	export default {
		data() {
			return {
				id: 0,
				loading: true,
				watchlist: 0,
				movie: {
					title: "",
					description: "",
					mainphoto: "",
					runTime: "",
					releaseDate: "",
					genres: [],
					reviews: [],
					photos: [],
					videos: [],
					actors: [],
					company: [],
					storyLine: "",
					language: "",
					video: "",
				},
			}
		},
		computed:{
			rating() {
				if(this.movie.reviews.length > 0){
					let totalRating = 0;
					this.movie.reviews.forEach((review) => {
						totalRating +=  Number(review.rating);
						console.log(totalRating)
					});
					return totalRating / this.movie.reviews.length;
				}
				return 0;
			}
		},
		beforeCreate(){
			 let id = this.$route.params.id;
			console.log(id);
			axios.get('/movie/' + id).then( response => {
				console.log(response);
				const data = response.data;
				this.movie = data;
				console.log("movie data: " + JSON.stringify(this.movie));
				console.log("Genre data" +  this.movie.genres);
				this.loading = false;
			});

			if(this.$auth.check()) {
				axios.get('/movie/' + id + '/watchlist').then(response => {
					console.log(response);
					this.watchlist = response.data;
				});
			}
			eventBus.$on('reviewWasMade', (data) => {
				axios.get('/movie/' + id).then( response => {
					console.log(response);
					const data = response.data;
					this.movie = data;
					console.log("movie data: " + JSON.stringify(this.movie));
					console.log("Genre data" +  this.movie.genres);
					this.loading = false;
				});
			});

		},
		created(){
			$('.carousel').carousel({
				interval: 2000
			})
		},
		methods: {
			addMovieToWatchlist(){
				axios.post('user/watchlist/add/' + this.movie.id)
					.then(res => this.watchlist = 1)
					.catch(error => console.log(error));
			},
			removeMovieFromWatchlist(){
				axios.post('user/watchlist/remove/' + this.movie.id)
					.then(res => this.watchlist = 0)
					.catch(error => console.log(error));
			},

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
		font-size: 12px;
		text-align: center;
		min-height: 100px;
	}

	.photo {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
	}
	.textblock {

	}
</style>