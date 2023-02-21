require('./bootstrap');

import Vue from 'vue';
import Menu from './components/Menu.vue';
import registrarEntrada from './components/registrarEntrada.vue';

new Vue({
  el: '#app',
  components: {
    Menu,
    registrarEntrada
  },
});
