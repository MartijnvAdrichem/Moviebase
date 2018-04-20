<template>
	<div>
		<div class="row">
			<div class="col-md-10">
				<h1>All Actors</h1>
			</div>
			<div class="col-md-2">
				<router-link tag="button" class="btn btn-primary" :to="{path: '/actor/new'}">New Actor</router-link>
			</div>
		</div>
		<input type="text" placeholder="filter" class="form-control" v-model="searchterm">
		<ul class="list-group">
			<router-link tag="li" class="list-group-item" v-for="actor in actors"  :key="actor.id" active-class="active" :to="{path: '/actor/' + actor.id}"><a>{{actor.firstname}} {{actor.prefix ? actor.prefix : ""}} {{actor.lastname}}</a></router-link>
		</ul>
	</div>
</template>

<script>
	import axios from 'axios';


	export default {
		data() {
			return{
				allActors: [],
				searchterm: ""
			}
		},
		computed: {
			actors() {
				return this.allActors.filter( (actor) => {
					let actorname = actor.firstname + " " + (actor.prefix ? actor.prefix + " " : "") + actor.lastname;
					return actorname.toLowerCase().match(this.searchterm.toLowerCase())
				})
			}
		},
		methods: {

		},
		beforeCreate(){
			axios.get('/actor/all').then( response => {
				console.log(response);
				const data = response.data;
				const resultArray = [];
				for (let key in data) {
					resultArray.push(data[key]);
				}
				this.allActors = resultArray;
			});
		},
		name: "index-actor"
	}
</script>

<style scoped>

</style>