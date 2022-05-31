/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
 
import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2'; 
import 'sweetalert2/src/sweetalert2.scss';

Vue.use(VueSweetalert2); 
Vue.component('acreditador', require('./components/ExampleComponent.vue').default);
 
const app = new Vue({
    el: '#app',
});
