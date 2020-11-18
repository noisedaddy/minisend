import EmailAPI from "@services/api/EmailAPI";


const actions = {
    async fetchEmails({ commit }) {
        const emails = await EmailAPI.getAll();
        commit(SET_EMAILS, emails);
        return emails;
    },
};

export default {
    namespaced: true,
    actions
}
