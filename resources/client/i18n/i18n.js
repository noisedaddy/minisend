import Vue from 'vue';
import VueI18n from 'vue-i18n'
import english from "./languages/english";

Vue.use(VueI18n);

const i18n = new VueI18n({
    locale: 'en', // set locale
    messages : {
        en: english
    },
});

export default i18n;
