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
