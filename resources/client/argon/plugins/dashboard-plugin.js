// Polyfills for js features used in the Dashboard but not supported in some browsers (mainly IE)
import '@argon/polyfills';
// Notifications plugin. Used on Notifications page
import Notifications from '@argon/components/NotificationPlugin';
// Validation plugin used to validate forms
import VeeValidate from 'vee-validate';
// A plugin file where you could register global components used across the app
// A plugin file where you could register global directives
// Sidebar on the right. Used as a local plugin in DashboardLayout.vue
import SideBar from '@argon/components/SidebarPlugin';

// element ui language configuration
import lang from 'element-ui/lib/locale/lang/en';
import locale from 'element-ui/lib/locale';
import GlobalDirectives from './globalDirectives';
import GlobalComponents from './globalComponents';

// asset imports
import '@argon/assets/sass/argon.scss';
import '@argon/assets/css/nucleo/css/nucleo.css';

locale.use(lang);

export default {
  install(Vue) {
    Vue.use(GlobalComponents);
    Vue.use(GlobalDirectives);
    Vue.use(SideBar);
    Vue.use(Notifications);
    Vue.use(VeeValidate, {
      fieldsBagName: 'veeFields',
      classes: true,
      validity: true,
      classNames: {
        valid: 'is-valid',
        invalid: 'is-invalid',
      },
    });
  },
};
