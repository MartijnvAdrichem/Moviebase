<template>
	<div class="col-md-12" v-if="$auth.check()">
		<h2>New review</h2>
		<p class="text-danger font-weight-bold" v-if="response">{{response}}</p>
		<form @submit.prevent="createReview" methods="post">
		<star-rating
				v-bind:increment="0.5"
				v-bind:max-rating="5"
				v-model="review.rating"
				inactive-color="#000"
				active-color="#E4BB24"
				v-bind:star-size="40"
		></star-rating>
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" id="title" class="form-control" v-model="review.title" required></input>
		</div>
		<div class="form-group">
			<label for="content">Content</label>
			<textarea rows="4" type="text" id="content" class="form-control" v-model="review.content" required></textarea>
		</div>
		<div class="submit">
			<button class="btn btn-dark" type="submit">Submit</button>
		</div>
		</form>
	</div>
</template>

<script>
	import axios from 'axios';

	export default {
		props: ['movie_id'],
		
		data(){
			return{
				response: null,

				review: {
					title: "",
					content: "",
					rating: 1
				}
			}
		},
		methods: {
			createReview(){

				const params = {
					title: this.review.title,
					content: this.review.content,
					rating: this.review.rating,
					movie_id: this.movie_id
				};
				console.log(params);
				axios.post('/review/create', params)
					.then(res => console.log(res))
					.catch(resp => {
						this.response = resp.response.data.message;
					});
			}

	},
		name: "create-review"
	}
</script>

<style scoped>

</style>