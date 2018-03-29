import Vue from 'vue'
import VueRouter from 'vue-router'
import axios from 'axios';
import VueAxios from 'vue-axios';
import Vuelidate from 'vuelidate';
import App from './views/App.vue'
import router from './router'


axios.defaults.baseURL = '/api';
Vue.use(Vuelidate);
Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.router = router;
App.router = Vue.router;

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


