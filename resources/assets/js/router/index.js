import VueRouter from 'vue-router'
import store from '../store'
import Home from '../components/Home.vue'
import Register from '../components/Register.vue'
import Login from '../components/Login.vue'
import Dashboard from '../components/Dashboard.vue'

const router = new VueRouter({
	routes: [
		{
			path: '/',
			name: 'Home',
			component: Home,
			meta: {
				auth: false
			}
		},
		{
			path: '/register',
			name: 'Register',
			component: Register,
			meta: {
				auth: false
			}
		},
		{
			path: '/login',
			name: 'Login',
			component: Login,
			meta: {
				auth: false
			}
		},
		{
			path: '/dashboard',
			name: 'Dashboard',
			component: Dashboard,
			meta: {
				auth: true
			}
		},
		{
			path: '*',
			redirect: '/'
		}
	]
});

router.beforeEach((to, from, next) => {
	if (!store.getters.isLogged && to.meta.auth) {
		return next('/login')
	}

	if (store.getters.isLogged && to.name === 'Login') {
		return next('/')
	}

	next()
})

export default router