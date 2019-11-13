import _API from './_API';

let API = new _API;
const UsersAPI = {};

UsersAPI.getCurrentUser = function () {
    return API
        .get('users/me')
        .then((res) => {
            return res.data.data;
        })
};

export default UsersAPI;
