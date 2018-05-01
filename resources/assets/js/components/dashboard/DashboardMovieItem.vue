<template>
	<div>
		<div class="card" style="min-height: 18em; max-height: 18em;">
			<img style="min-height: 12em; max-height: 12em;" :src=" movie.mainphoto ? '/images/' + movie.mainphoto : '/images/placeholder.png'" alt="" class="card-img-top image-responsive">
			<div style="min-height: 6em; max-height: 6em;" class="card-body">
				<router-link tag="h5" class="text-center card-title font-weight-bold" :to="{path:'/movie/' + movie.id}">{{movie.title}}</router-link>
			</div>
		</div>
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