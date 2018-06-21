import Vue from 'vue';
import VueRouter from 'vue-router'
import store from '../store'

import Home from '../pages/Home.vue'

Vue.use(VueRouter)

const router = new VueRouter({
	routes: [
		{
			path: '/',
			name: 'home',
			component: Vue.component('Home', Home)
		},
		// {
		// 	path: '/cafes',
		// 	name: 'cafes',
		// 	component: Vue.component( 'Cafes', require( './pages/Cafes.vue' ) )
		// },
		// {
		// 	path: '/cafes/new',
		// 	name: 'newcafe',
		// 	component: Vue.component( 'NewCafe', require( './pages/NewCafe.vue' ) )
		// },
		// {
		// 	path: '/cafes/:id',
		// 	name: 'cafe',
		// 	component: Vue.component( 'Cafe', require( './pages/Cafe.vue' ) )
		// }
	]
});

// router.beforeEach((to, from, next) => {
// 	if (!store.getters.isLogged && to.meta.auth) {
// 		return next('/login')
// 	}
//
// 	if (store.getters.isLogged && to.name === 'Login') {
// 		return next('/')
// 	}
//
// 	next()
// })

export default router