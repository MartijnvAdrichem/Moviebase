<template>
	<div>
		<router-link style="cursor: pointer;" tag="div" :to="{path:'/actor/' + actor.id}">
		<div class="" style="min-height: 18em; max-height: 18em;">
			<img style="min-height: 20em; max-height: 20em; min-width: 13em; max-width: 13em;" :src="actor.profilephoto ? '/images/' + actor.profilephoto : '/images/placeholder_avatar.png'"alt="" class="rounded-circle card-img-top img-responsive">
			<div style="min-height: 6em; max-height: 6em; min-width: 13em; max-width: 13em;" class="card-body">
				<h5 class="text-center card-title font-weight-bold">{{actor.firstname}} {{actor.prefix}} {{actor.lastname}}</h5>
			</div>
		</div>
		</router-link>
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