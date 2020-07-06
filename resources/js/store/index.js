import axios from "axios";
import {saveUserData} from "../utils";
export default {
    state: {
        token: "",
        loading: false,
        user: null,
        error: false,
        restaurants: [],
    },
    mutations: {
        setToken(state, token) {
            state.token = token;
        },
        setLoading(state, loading) {
            state.loading = loading;
        },
        setError(state, error) {
            state.error = error;
        },
        setUser(state, user) {
            state.user = user;
        },
        setRestaurant(state, restaurant) {
            state.restaurants = restaurant;
        }
    },

    actions: {
        async login({commit}, userPayload) {
            try {
                commit('setLoading', true);
                commit('setError', false);
                await axios.post('/api/login', {
                    email: userPayload.email,
                    password: userPayload.password
                }).then(({data}) => {
                    console.log(data);
                    commit("setUser", data.user);
                    commit('setToken', data.token);
                    commit('setLoading', false);
                    commit('setError', false);
                    saveUserData(data, data.user)
                });
            } catch (e) {
                console.error(e)
                commit('setLoading', false);
                commit('setError', true);
            }
        },

        logout({commit}) {
            return new Promise((resolve) => {
                localStorage.removeItem('token');
                commit('setToken', null);
                resolve();
            })
        },

        // load the restaurant's information
        async loadRestaurants({commit}, apiUrl) {
            commit('setLoading', true);
            const {data} = await axios.get(apiUrl);
            console.log(data);
            commit('setLoading', false);
            commit('setRestaurant',data.data);
        }
    },

    getters: {
        token: state => state.token,
        loading: state => state.loading,
        error: state => state.error,
        user: state => state.user,
        restaurants: state => state.restaurants,
        isAuthenticated: state => !!state.token,
    }
}
