<template>
	<div>
		<div style="margin-top: 10px" class="row col-md-12">
			<star-rating
					v-bind:increment="0.5"
					v-bind:max-rating="5"
					v-model="review.rating"
					inactive-color="#000"
					active-color="#E4BB24"
					v-bind:star-size="20"
					:read-only = "true"
					:show-rating = "false"
			></star-rating>
		</div>
		<br>
		<div class="row col-md-12">
			<p style="font-size: 1.2em" class=" specialp font-weight-bold"> {{review.title}} | by: {{review.user.name}}</p>
		</div>
		<br>
		<br>
		<div style="padding-bottom: 10px" class="row  col-md-12" >
			<p>{{review.content}}</p>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['review'],
		// data() {
		// 	return{
		// 		review: {
		// 			user: {
		// 				id: 0,
		// 				name: "",
		// 			},
		// 			title: "",
		// 			content: "",
		// 			rating: 1
		// 		}
		// 	}
		// },


		name: "detail-review"
	}
</script>

<style scoped>
	.specialp {
		margin: 0;
		padding: 0;
	}
</style>