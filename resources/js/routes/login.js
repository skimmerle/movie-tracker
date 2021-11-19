const login = () =>import ( '../components/login.vue')

export default [
    {
        path: '/login',
        component: login,
        name: 'login',
    },
]
