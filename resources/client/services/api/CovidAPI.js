import _API from './_API';
import moment from 'moment-timezone';

let API = new _API;

const CovidAPI = {
    getAll(endpt = 'home') {
        return API
            .get(endpt)
            .then((res) => {
                return res.data;
            })
    }
};

export default CovidAPI;
