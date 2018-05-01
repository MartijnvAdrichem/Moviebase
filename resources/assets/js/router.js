import VueRouter from 'vue-router'
import CreateMovie from './components/movies/CreateMovie.vue';
import Hello from './views/Hello.vue'
import Home from './views/Home.vue'
import Dashboard from './views/Dashboard.vue';
import Register from './components/Register.vue';
import Login from './components/Login.vue';
import CreateActor from './components/actors/CreateActor.vue';
import EditMovie from './components/movies/EditMovie.vue';
import IndexMovie from './components/movies/IndexMovie.vue';
import DetailMovie from './components/movies/DetailMovie.vue';
import DetailActor from './components/actors/DetailActor.vue';
import IndexActor from './components/actors/IndexActor.vue';
import EditActor from './components/actors/EditActor.vue';
import Watchlist from './components/users/Watchlist.vue';

const routes = [{
	path: '/',
	name: 'home',
	component: Dashboard
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
}, {
	path: '/actor/new',
	component: CreateActor,
	meta: {
		auth: true
	}
}, {
	path: '/movie/edit/:id',
	component: EditMovie,
	props: true,
	meta: {
		auth: true
	},
}, {
	path: '/movie',
	component: IndexMovie,
}, {
	path: '/actor',
	component: IndexActor,
}, {
	path: '/movie/:id',
	component: DetailMovie,
	props: true,
}, {
	path: '/actor/:id',
	component: DetailActor,
	props: true,
}, {
	path: '/actor/edit/:id',
	component: EditActor,
	props: true,
	meta: {
		auth: true
	},
}, {
	path: '/user/watchlist',
	component: Watchlist,
	props: true,
	meta: {
		auth: true
	},
}
];

export default new VueRouter({mode: 'history', routes})
