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
                res.data.data = res.data.data.map((email) => {
                    return email;
                })

                return res.data;
            })
    },
    sendEmail(sender, recipient, subject, text_content, html_content) {
        return API
            .post('emails', {
                sender,
                recipient,
                subject,
                text_content,
                html_content
            })
            .then((res) => {
                return res;
            })
    },
};

export default EmailAPI;
