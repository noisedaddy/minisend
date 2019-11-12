import JWToken from "@services/auth/JWToken";

export default {
    isLoggedIn() {
        let jwt = new JWToken();
        return jwt.isValid();
    },

    getJWToken() {
        let jwt = new JWToken();
        return jwt.getToken();
    }
}
