import _API from './_API';

let API = new _API;
const AuthAPI = {};

AuthAPI.login = function (email, password) {
    return API
        .post('login', {
            email,
            password
        })
        .then((res) => {
            return res.data.data;
        })
};

export default AuthAPI;
