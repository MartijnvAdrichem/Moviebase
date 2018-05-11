<template>
	<div>
		<div v-if="loading">Loading...</div>
		<div v-else>
			<div class="row">
				<div class="col-md-8">
					<h1>{{actor.firstname}} {{actor.prefix}} {{actor.lastname}}</h1>
				</div>
				<div class="col-md-4">
					<router-link tag="button" class="pull-right btn btn-primary" :to="{path: '/actor/edit/' + actor.id}">Edit actor</router-link>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-4">
					<img style=""  class="img-responsive center-block" :src="actor.profilephoto ? '/images/' + actor.profilephoto : '/images/placeholder_avatar.png'" alt="">
				</div>
				<div class="textblock col-md-6">
					<p class="font-weight-bold">Born: {{actor.birthday | formatBirthday}}</p>
					{{actor.biography}}
				</div>
			</div>
			<hr>
			<h1>Filmography</h1>
			<div class="row col-md-12">
				<li class=" col-md-12 list-group">
					<router-link style="cursor: pointer;" class="list-group-item" tag="ul" v-for="movie in actor.movies" :to="'/movie/' + movie.id">
						<div class="col-md-4">
							<p class="font-weight-bold">{{movie.title}}</p>
							<p> {{movie.pivot.role}}</p>
						</div>
						<div class="col-md-4 col-md-offset-4"><p align="right"> {{movie.releaseDate | formatDate }}</p></div>
					</router-link>
				</li>
			</div>



		</div>
	</div>
</template>

<script>
	import axios from 'axios';

	export default {
		data(){
			return{
				loading: true,
				actor: {
					firstname: "",
					prefix: "",
					lastname: "",
					biography: "",
					birthday: "",
					profilephoto: "",
					photos: [],
					movies: [],
				}
			}
		},
		beforeCreate(){
			let id = this.$route.params.id;
			console.log(id);
			axios.get('/actor/' + id).then( response => {
				console.log(response);
				const data = response.data;
				this.actor = data;
				this.loading = false;
			});
		},
		name: "detail-actor"
	}
</script>

<style scoped>
	.textblock {
		word-wrap: break-word;
		font-family: inherit;
	}
</style>