import JWToken from "@services/auth/JWToken";

export default {
    isLoggedIn() {
        let jwt = new JWToken();
        return jwt.isValid();
    },

    getJWToken() {
        let jwt = new JWToken();
        return jwt.getToken();
    },

    logIn(token, expiresIn) {
        return new JWToken(token, expiresIn);
    },

    logOut() {
        localStorage.removeItem('teq_jwt');
        localStorage.removeItem('teq_jwt_expires_at');
    }
}
