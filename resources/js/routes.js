import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);
export default new VueRouter({
    routes: [{
        path: '/mi-componente',
        name: 'mi-componente',
        component: require('./views/MiComponente.vue').default,
    }, ],
    mode: 'history'
})