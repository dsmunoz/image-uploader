require('./bootstrap');

import 'element-ui/lib/theme-chalk/index.css';
import Vue from 'vue'
import App from './vue/app'

const app = new Vue({
    el: '#app',
    components: {
        App
    }
})
