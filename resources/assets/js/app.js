
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import VueAxios from 'vue-axios';
import App from './App.vue';
import Home from './components/Home.vue';
import Register from './components/Register.vue';
import Login from './components/Login.vue';
import Dashboard from './components/Dashboard.vue';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

axios.defaults.baseURL = 'http://localhost:8000/api';

const router = new VueRouter({
	routes: [
		{
			path: '/',
			name: 'home',
			component: Home,
			meta: {
				auth: false
			}
		},
		{
			path: '/register',
			name: 'register',
			component: Register,
			meta: {
				auth: false
			}
		},
		{
			path: '/login',
			name: 'login',
			component: Login,
			meta: {
				auth: false
			}
		},
		{
			path: '/dashboard',
			name: 'dashboard',
			component: Dashboard,
			meta: {
				auth: true
			}
		}
	]
});

Vue.router = router;

Vue.use(require('@websanova/vue-auth'), {

	// adds the authentication token to the our request header during requests
	auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),

	// configures vue-auth to use the axios http driver
	http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),

	// configures vue-auth to use the driver for vue-router
	router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
});

App.router = Vue.router;

new Vue(App).$mount('#app');

