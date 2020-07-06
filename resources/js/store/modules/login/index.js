import axios from 'axios';

const state = {
    token: null,
    loading: true,
    user: null
}

const mutations = {
    SET_TOKEN(state, token) {
        state.token = token;
    },
    LOGIN_PENDING(state)  {
        state.loading  = true;
    },
    LOGIN_SUCCESS(state) {
        state.loading = false;
    }
}

const actions = {
    login({commit}, userPayload) {
        commit('LOGIN_PENDING');
        return axios.post('/api/login', {
            email: userPayload.email,
            password: userPayload.password
        }).then(({data}) => {
            commit('SET_TOKEN', data.token);
            commit('LOGIN_SUCCESS');
        });
    },

    logout({commit}) {
        return new Promise((resolve) => {
            localStorage.removeItem('token');
            commit('SET_TOKEN', null);
            resolve();
        })
    }
}

const getters = {
    token: state => state.token,
    loading: state => state.loading,
}

const loginModule = {
    state,
    mutations,
    actions,
    getters
};

export default loginModule;
