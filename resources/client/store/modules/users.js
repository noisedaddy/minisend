const state = {
    currentUser: null
};

const getters = {

};

const actions = {

};

const mutations = {
    setCurrentUser(state, userData) {
        state.currentUser = userData;
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
