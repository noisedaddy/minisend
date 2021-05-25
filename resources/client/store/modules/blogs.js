import BlogsAPI from "@services/api/BlogsAPI";


const actions = {
    async fetchBlogs({ commit }) {
        const blogs = await BlogsAPI.getAll();
        return blogs;
    },
};

export default {
    namespaced: true,
    actions
}
