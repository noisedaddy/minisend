<template>
    <div class="wrapper">
        <notifications></notifications>

        <BaseLoading v-if="loading" :full-page="true"></BaseLoading>

        <div v-if="!loading" class="main-content">
            <dashboard-navbar type="light"></dashboard-navbar>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div>
                            <fade-transition :duration="100" origin="center top" mode="out-in">
                                <!-- your content here -->
                                <router-view></router-view>
                            </fade-transition>
                        </div>


                        <dashboard-footer v-if="!$route.meta.hideFooter"></dashboard-footer>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    /* eslint-disable no-new */
    import PerfectScrollbar from 'perfect-scrollbar';
    import 'perfect-scrollbar/css/perfect-scrollbar.css';
    import AuthService from "@services/auth/AuthService";

    function hasElement(className) {
        return document.getElementsByClassName(className).length > 0;
    }

    function initScrollbar(className) {
        if (hasElement(className)) {
            new PerfectScrollbar(`.${className}`);
        } else {
            // try to init it later in case this component is loaded async
            setTimeout(() => {
                initScrollbar(className);
            }, 100);
        }
    }

    import DashboardNavbar from './DashboardNavbar.vue';
    import DashboardFooter from './DashboardFooter.vue';
    import {FadeTransition} from 'vue2-transitions';
    import BaseLoading from "@shared/BaseLoading";
    import UsersAPI from "@services/api/UsersAPI";

    export default {
        name: "DashboardLayout",
        beforeRouteEnter(to, from, next) {
            if (!AuthService.isLoggedIn()) {
                next('/auth/login');
            } else {
                next();
            }
        },
        components: {
            BaseLoading,
            DashboardNavbar,
            DashboardFooter,
            FadeTransition
        },
        data() {
            return {
                loading: true
            }
        },
        methods: {
            initScrollbar() {
                let isWindows = navigator.platform.startsWith('Win');
                if (isWindows) {
                    initScrollbar('scrollbar-inner');
                }
            }
        },
        created() {
            this.loading = true;

            UsersAPI
              .getCurrentUser()
              .then((user) => {
                  this.$store.commit('users/setCurrentUser', user);
              })
              .finally(() => this.loading = false)
        },
        mounted() {
            this.initScrollbar()
        }
    };
</script>
