import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler.js';
import ProductComponent from './components/ProductComponent.vue' 
 
createApp({}) 
    .component('ProductComponent', ProductComponent)
    .mount('#app') 
