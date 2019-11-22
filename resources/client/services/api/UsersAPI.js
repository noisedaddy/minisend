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
                let users = res.data.data;
                users = users.map((user) => {
                    user.first_login = moment('2018-07-12 09:00:00', 'YYYY-MM-DD HH:mm:ss').tz(user.timezone).format();
                    user.last_login = moment('2018-07-17 19:00:00', 'YYYY-MM-DD HH:mm:ss').tz(user.timezone).format();
                    user.display_name = `${user.first_name} ${user.last_name}`;
                    return user;
                });

                res.data.data = users;
                return res.data;
            })
    }
};

export default UsersAPI;
