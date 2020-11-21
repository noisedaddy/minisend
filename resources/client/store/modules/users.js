const state = {
    currentUser: null,
};

const getters = {
    currentUser(state) {
        return state.currentUser;
    }
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
    mutations
}
