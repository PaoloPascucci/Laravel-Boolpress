/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: Axios } = require('axios');

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);



const Home = Vue.component('Home', require('./pages/Home.vue').default);
const About = Vue.component('About', require('./pages/About.vue').default);
const Contacts = Vue.component('Contacts', require('./pages/Contacts.vue').default);
const Posts = Vue.component('Posts', require('./pages/Posts.vue').default);
const PostPage = Vue.component('Posts', require('./pages/PostPage.vue').default);


Vue.component('App', require('./App.vue').default);
const routes = [{
    path: '/',
    name: 'home',
    component: Home,
}, {
    path: '/about',
    name: 'about',
    component: About
},
{
    path: '/contacts',
    name: 'contacts',
    component: Contacts
}, {
    path: '/posts',
    name: 'posts',
    component: Posts
}
, {
    path: '/posts/:slug',
    name: 'post',
    component: PostPage
}
];


const router = new VueRouter({
    mode:'history',
    routes
})

Vue.component('posts-list', require('./components/PostsListComponent.vue').default);
Vue.component('post', require('./components/PostComponent.vue').default);

const app = new Vue({
    el: '#app',
    router
});

