import Vue from 'vue'
import VueRouter from 'vue-router'
import axios from 'axios';
import VueAxios from 'vue-axios';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

import App from './views/App.vue'
import Hello from './views/Hello.vue'
import Home from './views/Home.vue'
import Dashboard from './views/Dashboard.vue';
import Register from './components/Register.vue';
import Login from './components/Login.vue';

axios.defaults.baseURL = 'http://127.0.0.1:8000/';

const router = new VueRouter({
	mode: 'history',
	routes: [{
		path: '/',
		name: 'home',
		component: Home
	},{
		path: '/register',
		name: 'register',
		component: Register
	}, {
		path: '/login',
		name: 'login',
		component: Login
	},{
		path: '/dashboard',
		name: 'dashboard',
		component: Dashboard,
		meta: {
			auth: true
		}
	}]
});

Vue.router = router;
Vue.use(require('@websanova/vue-auth'), {
	auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
	http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
	router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
});
App.router = Vue.router;
new Vue(App).$mount('#app');