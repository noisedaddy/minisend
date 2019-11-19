import _API from './_API';

let API = new _API;

const UsersAPI = {
    getCurrentUser() {
        return API
            .get('users/me')
            .then((res) => {
                return res.data.data;
            })
    },
    getAll() {
        return API
            .get('users')
            .then((res) => {
                const users = res.data.data;
                return users.map((user) => {
                    user.display_name = `${user.first_name} ${user.last_name}`;
                    return user;
                })
            })
    }
};

export default UsersAPI;
