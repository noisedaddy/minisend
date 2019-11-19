import UsersAPI from '../../services/api/UsersAPI'
import {
    SET_USERS
} from '../mutations.type';

const state = {
    currentUser: null,
    users: [],
};

const getters = {
    users(state) {
        return state.users;
    },
    currentUser(state) {
        return state.currentUser;
    }
};

const actions = {
    async fetchUsers({ commit }) {
        const users = await UsersAPI.getAll();
        commit(SET_USERS, users);
        return users;
    },
};

const mutations = {
    setCurrentUser(state, userData) {
        state.currentUser = userData;
    },
    [SET_USERS] (state, users) {
        state.users = users;
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
