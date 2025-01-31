
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import store from './store/index'

import Toasted from 'vue-toasted';
  
Vue.config.productionTip = false
Vue.use(Toasted, {
  duration: 2000
})

Vue.component('county', require('./components/County.vue').default)
Vue.component('city', require('./components/City.vue').default)
Vue.component('create-city', require('./components/CreateCity.vue').default)

const app = new Vue({
    el: '#app',
    store
});
