import Vue from 'vue'
import VueRouter from 'vue-router'
import home from './routes/home';
import login from './routes/login';
import search from './routes/search';

Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    scrollBehavior: (to, from, savedPosition) => ({ y: 0 }),
    routes: [
        ...home,
        ...login,
        ...search
    ],
});

//Vue.prototype.$isAuthenticated = true;

router.beforeEach((to, from, next) => {
    if ((to.name !== 'login' || to.name === null) && !Vue.prototype.$isAuthenticated) next({ name: 'login' })
    if ((to.name === 'login' || to.name === null) && Vue.prototype.$isAuthenticated) next({ name: 'home' })
    next()
});

export default router;
