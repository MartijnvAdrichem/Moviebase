import VueRouter from 'vue-router'
import CreateMovie from './components/movies/CreateMovie.vue';
import Hello from './views/Hello.vue'
import Home from './views/Home.vue'
import Dashboard from './views/Dashboard.vue';
import Register from './components/Register.vue';
import Login from './components/Login.vue';

const routes = [{
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
}, {
	path: '/movie/new',
	component: CreateMovie,
	meta: {
		auth: true
	}
}
];

export default new VueRouter({mode: 'history', routes})
