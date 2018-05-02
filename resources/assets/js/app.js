import Vue from 'vue'
import VueRouter from 'vue-router'
import axios from 'axios';
import VueAxios from 'vue-axios';
import Vuelidate from 'vuelidate';
import App from './views/App.vue'
import router from './router'
import image from './components/image.vue';
import VueCarousel from 'vue-carousel';
import VueYouTubeEmbed from 'vue-youtube-embed'
import moment from 'moment';
import StarRating from 'vue-star-rating'

Vue.use(VueYouTubeEmbed);
Vue.use(VueCarousel);
axios.defaults.baseURL = '/api';
Vue.use(Vuelidate);
Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.component('app-image', image);
Vue.component('star-rating', StarRating);
Vue.router = router;
App.router = Vue.router;
export const eventBus = new Vue();

Vue.filter('formatDate', function(value) {
	if (value) {
		return moment(String(value)).format('YYYY')
	}
});
Vue.filter('formatBirthday', function(value) {
	if (value) {
		return moment(String(value)).format('DD-MM-YYYY')
	}
});
Vue.filter('minToHour', function(value) {
	if (value) {
		let hours = Math.floor(value / 60);
		let mins = value % 60;
		return hours + "h" + " " + mins + "min"

	}
});


Vue.use(require('@websanova/vue-auth'), {
	auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
	http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
	router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
});

new Vue({
	el: '#app',
	router,
	render: h => h(App)
})


