require('./bootstrap');

import Vue from 'vue';
import axios from 'axios';
import Menu from './components/Menu.vue';
import registrarEntrada from './components/registrarEntrada.vue';

window.Vue = Vue;
window.axios = axios;

new Vue({
  el: '#app',
  components: {
    Menu,
    registrarEntrada
  },
});
