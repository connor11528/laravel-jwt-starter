
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';

import Vue from 'vue';
import router from './router';
import store from './store'
import App from './App.vue';

new Vue({
	el: '#app',
	router,
	store,
	template: '<App/>',
	components: { App }
})

