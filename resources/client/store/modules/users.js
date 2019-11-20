const state = {
    currentUser: null,
};

const getters = {
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
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
