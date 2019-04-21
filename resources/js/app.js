require('./bootstrap');

window.Vue = require('vue');

let axios = require('axios');

Vue.component('article-comment', require('./components/ArticleComment.vue').default);

const app = new Vue({
    el: '#app'
});
