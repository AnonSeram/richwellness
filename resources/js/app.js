require('./bootstrap');

import Vue from 'vue';
import ChatBox from './components/ChatBox.vue';

Vue.component('chat-box', ChatBox);

const app = new Vue({
    el: '#app'
});
