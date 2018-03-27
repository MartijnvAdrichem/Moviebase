<template>
	<div>
		<app-header></app-header>
		<div>
			<router-view></router-view>
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