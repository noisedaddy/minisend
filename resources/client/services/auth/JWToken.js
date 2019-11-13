import moment from "moment";

export default class JWToken {
    /**
     * @param JWT: String
     * @param expiresIn: Number - expiration in seconds
     */
    constructor(JWT, expiresIn) {
        this.JWT = null;
        this.expiresAt = null;

        if (JWT || expiresIn) {
            this.setLocalStorageToken(JWT, expiresIn);
        } else {
            this.getLocalStorageToken();
        }
    }

    setLocalStorageToken(JWT, expiresIn) {
        let expiresAt = moment().unix() + expiresIn;

        localStorage.setItem('teq_jwt', JWT);
        localStorage.setItem('teq_jwt_expires_at', expiresAt);

        this.JWT = JWT;
        this.expiresAt = expiresAt;
    }

    getLocalStorageToken() {
        this.JWT = localStorage.getItem('teq_jwt');
        this.expiresAt = parseInt(localStorage.getItem('teq_jwt_expires_at'));
    }

    isValid() {
        if (!this.JWT || !this.expiresAt) {
            return false;
        }

        return this.expiresAt > moment().unix();
    }

    getToken() {
        return this.JWT;
    }
}
