import Vue from "vue";
import VueRouter from "vue-router"
import Homepage from "../pages/Homepage";
import Login from "../pages/auth/Login";
import Register from "../pages/auth/Register";

Vue.use(VueRouter);

// ROUTES
const routes = [
    { path: '/', component: Homepage, name: "homepage" },
    { path: '/login', component: Login, name: "login"},
    { path: '/register', component: Register, name: "register"},
];

const router = new VueRouter({
    routes,
    mode: "history"
});

export default router;

