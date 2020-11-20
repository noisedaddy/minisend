<template>
    <div class="mainNavBarWrap">
        <base-nav
            container-classes="container-fluid"
            class="bg-white navbar-top border-bottom navbar-expand mainNavBarHeader"
        >
            <template slot="brand">
                <router-link to="/dashboard/overview">
                    <span>Home</span>
                </router-link>
            </template>

            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center ml-md-auto">
            </ul>
            <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                <base-dropdown
                    :has-toggle="true"
                    menu-on-right
                    class="nav-item"
                    tag="li"
                    title-tag="a"
                    title-classes="nav-link pr-0 d-flex align-items-center"
                >
                    <a href="#" class="nav-link pr-0" @click.prevent slot="title">
                        <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" :src="currentUser.avatar ? currentUser.avatar :  '/img/empty_user.png'">
                  </span>
                            <div class="media-body ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">{{currentUser.first_name}} {{currentUser.last_name}}</span>
                            </div>
                        </div>
                    </a>

                    <template>

                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>
                        <a @click="logout" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>

                    </template>
                </base-dropdown>
            </ul>
        </base-nav>
        <nav class="navbar navbar-expand-lg navbar-light mainNavBarSubheader">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavBarSubheaderInner"
                    aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation"
                    @click="showSubHeaderMenu = !showSubHeaderMenu"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" :class="{'show': showSubHeaderMenu}" id="mainNavBarSubheaderInner">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ml-auto mr-auto">
                    <li class="nav-item"
                        :class="{'active' : $route.path.indexOf('dashboard/overview') > -1}"
                    >
                        <router-link to="/dashboard/overview" class="nav-link">
                            <i class="fas fa-tachometer-alt"></i> {{ $t('dashboard') }}
                        </router-link>
                    </li>
                    <li class="nav-item"
                        :class="{'active' : $route.path.indexOf('dashboard/emails') > -1}"
                    >
                        <router-link to="/dashboard/emails" class="nav-link">
                            <i class="fas fa-users"></i> {{ $t('emails') }}
                        </router-link>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>
<script>
    import {BaseNav} from '@argon/components';
    import AuthService from "@services/auth/AuthService";

    export default {
        name: "DashboardNavbar",
        components: {
            BaseNav,
        },
        props: {},
        data() {
            return {
                activeNotifications: false,
                showMenu: false,
                searchModalVisible: false,
                searchQuery: '',
                showSubHeaderMenu: false,
                languages: [
                    {
                        locale: "en",
                        title: "English"
                    },
                    {
                        locale: "fr",
                        title: "Français"
                    }
                ]
            }
        },
        computed: {
            routeName() {
                const {name} = this.$route;
                return this.capitalizeFirstLetter(name);
            },
            currentUser() {
                return this.$store.state.users.currentUser;
            },
            selectedLanguage() {
                for (let i = 0; i < this.languages.length; i++) {
                    if (this.languages[i].locale === this.$i18n.locale) {
                        return this.languages[i];
                    }
                }

                return this.languages[0];
            }
        },
        methods: {
            changeLanguage(lang) {
                this.$i18n.locale = lang;
            },
            capitalizeFirstLetter(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            },
            toggleNotificationDropDown() {
                this.activeNotifications = !this.activeNotifications;
            },
            closeDropDown() {
                this.activeNotifications = false;
            },
            toggleSidebar() {
                this.$sidebar.displaySidebar(!this.$sidebar.showSidebar);
            },
            hideSidebar() {
                this.$sidebar.displaySidebar(false);
            },
            logout() {
                AuthService.logOut();
                this.$router.push('/auth/login');
            }
        }
    };
</script>
