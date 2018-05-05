<template>
	<div>
		<div class="" style="min-height: 18em; max-height: 18em;">
			<img style="min-height: 18em; max-height: 18em;" :src="actor.profilephoto ? '/images/' + actor.profilephoto : '/images/placeholder_avatar.png'"alt="" class="rounded-circle card-img-top img-responsive">
			<div style="min-height: 6em; max-height: 6em;" class="card-body">
				<router-link tag="h5" class="text-center card-title font-weight-bold" :to="{path:'/actor/' + actor.id}">{{actor.firstname}} {{actor.prefix}} {{actor.lastname}}</router-link>
			</div>
		</div>
		</div>
	</div>
</template>

<script>

	export default {
		props: ['actor'],

		name: "dashboard-movie-item"
	}
</script>

<style scoped>

</style>