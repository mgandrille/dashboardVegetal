import'jquery';
import 'popper.js';
import 'bootstrap';

import Vue from 'vue';
import App from './App.vue'
import router from './router';
import Axios from 'axios';
import VueScrollTo from 'vue-scrollto';

Vue.config.productionTip = false;
Vue.prototype.$http = Axios;
Vue.use(VueScrollTo);

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
