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
    getUserDetails(userID) {
        return API
            .get('users/'+userID)
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
    },
    sendEmail(first_name, last_name, email) {
        return API
            .post('users', {
                first_name,
                last_name,
                email
            })
            .then((res) => {
                return res;
            })
    },
    search(search_phrase) {
        return API
            .post('users/search', {
                search_phrase
            })
            .then((res) => {
                console.log(res);
                return res;
            })
    },
};

export default UsersAPI;
