import _API from './_API';
import moment from 'moment-timezone';

let API = new _API;

const EmailAPI = {
    getEmailDetails(emailID) {
        return API
            .get('emails/'+emailID)
            .then((res) => {
                return res.data.data;
            })
    },
    getAll(endpt = 'emails') {
        return API
            .get(endpt)
            .then((res) => {
                return res.data;
            })
    },
    sendEmail(sender, recipient, subject, text_content, html_content, uniqueID, items) {
        return API
            .post('emails', {
                sender,
                recipient,
                subject,
                text_content,
                html_content,
                uniqueID,
                items
            })
            .then((res) => {
                return res;
            })
    },
    search(search_phrase, values) {
        return API
            .post('emails/search', {
                search_phrase,
                values
            })
            .then((res) => {
                console.log(res);
                return res;
            })
    },
    uploadFiles(formData, config) {
        return API
            .post('emails/upload', formData, config)
            .then((res) => {
                console.log(res);
                return res;
            })
    },
};

export default EmailAPI;
