/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import SweetModal from 'sweet-modal-vue/src/plugin.js';

Vue.use(SweetModal);

// const VueUploadComponent = require('vue-upload-component');
// Vue.component('file-upload', VueUploadComponent);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('flash', require('./components/Flash.vue'));
Vue.component('errors', require('./components/Errors.vue'));

Vue.component('new-proposal', require('./components/NewProposal.vue'));
Vue.component('modal', require('./components/Modal.vue'));
Vue.component(
  'portfolio-upload',
  require('./components/PortfolioUploadModal.vue')
);

Vue.component('job-view', require('./pages/Job.vue'));
Vue.component('profile-view', require('./pages/Profile.vue'));
Vue.component('settings-view', require('./pages/Settings.vue'));

const app = new Vue({
  el: '#app'
});
