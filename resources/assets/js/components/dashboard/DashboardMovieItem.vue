<template>
	<div>
		<router-link style="cursor: pointer;" tag="div" :to="{path:'/movie/' + movie.id}">
		<div class="card">
			<img  :src=" movie.mainphoto ? '/images/' + movie.mainphoto : '/images/placeholder.png'" alt="" class="card-img-top img-responsive">
			<div style="min-height: 4em; max-height: 4em;" class="card-body">
				<h5 class="text-center card-title font-weight-bold" >{{movie.title}}</h5>
			</div>
		</div>
		</router-link>
	</div>
</template>

<script>

	export default {
		props: ['movie'],

		name: "dashboard-movie-item"
	}
</script>

<style scoped>

</style>