import Vue from "vue";
import VueRouter from "vue-router"
import Homepage from "../pages/Homepage";
import Restaurant from "../pages/restaurants";
import Login from "../pages/auth/Login";
import Register from "../pages/auth/Register";
import Logout from "../pages/auth/Logout";

Vue.use(VueRouter);

// ROUTES
const routes = [
    { path: '/', component: Homepage, name: "homepage" },
    { path: '/register', component: Register, name: "register"},
    { path: '/login', component: Login, name: "login"},
    { path: '/logout', component: Logout, name: "logout"},
    { path: '/restaurant/:slug', component: Restaurant, name: "restaurant"},
];

const router = new VueRouter({
    routes,
    mode: "history"
});

export default router;

