import AuthService from "@services/auth/AuthService";
import axios from 'axios';
import Vue from 'vue';

export default class _API {
    constructor() {
        let service = axios.create();
        service.interceptors.response.use(this.responseSuccess, this.responseError);
        service.interceptors.request.use(this.requestSuccess, this.requestError);

        this.apiPrefix = "api/";
        this.service = service;
    }

    /**
     * inject JWT token
     * @param config
     * @returns {*}
     */
    requestSuccess(config) {
        if (AuthService.isLoggedIn()) {
            //config.headers.Authorization = "Bearer " + AuthService.getJWToken();
        }

        return config;
    }

    requestError(error) {
        return Promise.reject(error);
    }

    responseSuccess(response) {
        return response;
    }

    responseError(error) {
        let message = "Error!";

        if (error.response.status === 422 || error.response.status === 401) {
            if (error.response.data && error.response.data.errors) {
                message = "";

                for (let key in error.response.data.errors) {
                    if (error.response.data.errors.hasOwnProperty(key)) {
                        error.response.data.errors[key].forEach((m) => {
                            message += m + "<br>";
                        })
                    }
                }
            } else {
                if (error.response.status === 403) {
                    message = "Unauthorized.";
                }
            }
        } else if (error.response.status === 404) {
            message = "Error! Resource not found";
        }

        Vue.prototype.$notify({type: 'danger', message: message});

        return Promise.reject(error);
    }

    get(url) {
        return this.service.get(this.apiPrefix + url);
    }

    post(url, data) {
        return this.service.post(this.apiPrefix + url, data);
    }

    patch(url, data) {
        return this.service.patch(this.apiPrefix + url, data);
    }

    put(url, data) {
        return this.service.put(this.apiPrefix + url, data);
    }

    delete(url) {
        return this.service.delete(this.apiPrefix + url);
    }
}
