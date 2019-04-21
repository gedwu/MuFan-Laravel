require('./bootstrap');

window.Vue = require('vue');

let axios = require('axios');

Vue.component('comment-box', require('./components/CommentBox.vue').default);

const app = new Vue({
    component: {

    },
    el: '#app'
});
