import CovidAPI from "@services/api/CovidAPI";


const actions = {
    async fetchCovid({ commit }) {
        const covid = await CovidAPI.getAll();
        commit(SET_COVID, covid);
        return covid;
    },
};

export default {
    namespaced: true,
    actions
}
