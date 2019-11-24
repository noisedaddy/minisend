import _API from './_API';
import moment from 'moment-timezone';

let API = new _API;

const UsersAPI = {
    getCurrentUser() {
        return API
            .get('users/me')
            .then((res) => {
                return res.data.data;
            })
    },
    getAll(endpt = 'users') {
        return API
            .get(endpt)
            .then((res) => {
                res.data.data = res.data.data.map((user) => {
                    user.first_login = user.first_login ? moment(user.first_login, 'YYYY-MM-DD HH:mm:ss').tz(user.timezone).format() : null;
                    user.last_login = user.first_login ? moment(user.last_login, 'YYYY-MM-DD HH:mm:ss').tz(user.timezone).format() : null;
                    return user;
                })

                return res.data;
            })
    }
};

export default UsersAPI;
