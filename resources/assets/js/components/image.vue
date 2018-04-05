<!--<template>-->
	<!--<div>-->
		<!--<img :src="imgsrc == undefined ? imgsrc : placeholder"  :style="{ 'width': imgwidth + 'px', 'height': imgheight + 'px'}" alt="">-->
	<!--</div>-->
<!--</template>-->

<!--<script>-->
	<!--export default {-->
		<!--data(){-->
			<!--return {-->
				<!--placeholder: "images/placeholder.png",-->
			<!--}-->
		<!--},-->
		<!--props:['imgsrc', 'imgwidth', 'imgheight'],-->

		<!--name: "image"-->
	<!--}-->
<!--</script>-->

<!--<style scoped>-->

<!--</style>-->

<template>

	    <img class="img-responsive" :src="src ? '/images/' + src : profile_placeholder" :alt="alt ? alt : default_alt_text">

</template>


<script>

	export default {
		data(){
			return{
				profile_placeholder: '/images/placeholder.png',
				default_alt_text: 'Profile Image'

			}
		},

		props: {
			src: '',
			alt: 'Profile Image'
		}

	}
</script>
