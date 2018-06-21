import './bootstrap'
import Vue from 'vue';
import router from './router/index'
import store from './store/index'

new Vue({
	router,
	store
}).$mount('#app');