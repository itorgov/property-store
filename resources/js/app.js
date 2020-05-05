import Vue from 'vue';
import { BootstrapVue } from 'bootstrap-vue'
import App from './App.vue';
import './axios';

Vue.use(BootstrapVue);

new Vue({
    el: '#app',
    render: h => h(App)
});
