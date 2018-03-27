<template>
	<div>
		<app-header></app-header>

		<div class="row">
			<div class="bg col-md-3 col-sm-3 col-xs-3"></div>
			<div class="col-md-6 col-sm-6 col-xs-6"><router-view></router-view></div>
			<div class="col-md-3 col-sm-3 col-xs-3"></div>
		</div>
	</div>

</template>

<script>
	import Header from '../components/Header.vue';

	export default {
		components:{
			appHeader: Header
		}
	}
</script>