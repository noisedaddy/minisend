import BaseInput from '@argon/components/Inputs/BaseInput.vue';
import BaseDropdown from '@argon/components/BaseDropdown.vue';
import Card from '@argon/components/Cards/Card.vue';
import Modal from '@argon/components/Modal.vue';
import StatsCard from '@argon/components/Cards/StatsCard.vue';
import BaseButton from '@argon/components/BaseButton.vue';
import Badge from '@argon/components/Badge.vue';
import RouteBreadcrumb from '@argon/components/Breadcrumb/RouteBreadcrumb';
import BaseCheckbox from '@argon/components/Inputs/BaseCheckbox.vue';
import BaseSwitch from '@argon/components/BaseSwitch.vue';
import BaseRadio from '@argon/components/Inputs/BaseRadio';
import BaseProgress from '@argon/components/BaseProgress';
import BasePagination from '@argon/components/BasePagination';
import BaseAlert from '@argon/components/BaseAlert';
import BaseNav from '@argon/components/Navbar/BaseNav';
import BaseHeader from '@argon/components/BaseHeader';
import { Input, Tooltip, Popover } from 'element-ui';
/**
 * You can register global components here and use them as a plugin in your main Vue instance
 */

const GlobalComponents = {
  install(Vue) {
    Vue.component(Badge.name, Badge);
    Vue.component(BaseAlert.name, BaseAlert);
    Vue.component(BaseButton.name, BaseButton);
    Vue.component(BaseCheckbox.name, BaseCheckbox);
    Vue.component(BaseHeader.name, BaseHeader);
    Vue.component(BaseInput.name, BaseInput);
    Vue.component(BaseDropdown.name, BaseDropdown);
    Vue.component(BaseNav.name, BaseNav);
    Vue.component(BasePagination.name, BasePagination);
    Vue.component(BaseProgress.name, BaseProgress);
    Vue.component(BaseRadio.name, BaseRadio);
    Vue.component(BaseSwitch.name, BaseSwitch);
    Vue.component(Card.name, Card);
    Vue.component(Modal.name, Modal);
    Vue.component(StatsCard.name, StatsCard);
    Vue.component(RouteBreadcrumb.name, RouteBreadcrumb);
    Vue.component(Input.name, Input);
    Vue.use(Tooltip);
    Vue.use(Popover);
  },
};

export default GlobalComponents;
