import Vue from 'vue'
import Router from 'vue-router'
import Main from './pages/Main'
import Result from './pages/Result'

Vue.use(Router)

const router = new Router({
    mode: 'history',
    routes: [
        {
            path : '/personality/test',
            name : 'personality.test',
            component : Main,
        },
        {
            path : '/personality/result',
            name : 'personality.result',
            component : Result,
            props: true
        }
    ]
})

export default router
