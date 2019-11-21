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
    getAll() {
        return API
            .get('users')
            .then((res) => {
                const users = res.data.data;
                return users.map((user) => {
                    user.first_login = moment('2018-07-12 09:00:00', 'YYYY-MM-DD HH:mm:ss').tz(user.timezone).format();
                    user.last_login = moment('2018-07-17 19:00:00', 'YYYY-MM-DD HH:mm:ss').tz(user.timezone).format();
                    user.display_name = `${user.first_name} ${user.last_name}`;
                    return user;
                })
            })
    }
};

export default UsersAPI;
