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
                <base-dropdown
                    :has-toggle="false"
                    class="nav-item"
                    tag="li"
                    title-tag="a"
                    title-classes="nav-link pr-0"
                    menuClasses="min-width-auto">
                    <template>
                        <a href="#" class="nav-link" @click.prevent slot="title">
                            <div class="media align-items-center">
                                <img alt="English" :src="'img/icons/flags/'+selectedLanguage.locale+'.png'" class="langFlag">
                            </div>
                        </a>
                    </template>
                    <template>
                        <a
                            v-for="(lang, i) in languages"
                            :key="i"
                            class="dropdown-item"
                            @click="changeLanguage(lang.locale)"
                        >
                            <img :alt="lang.title" :src="'img/icons/flags/'+lang.locale+'.png'" class="langFlag">
                            {{lang.title}}
                        </a>
                    </template>
                </base-dropdown>
                <base-dropdown class="nav-item"
                               tag="li"
                               title-classes="nav-link text-otest"
                               title-tag="a"
                               icon="ni ni-bell-55"
                               menu-classes="dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                    <template>
                        <!-- Dropdown header -->
                        <div class="px-3 py-3">
                            <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong>
                                notifications.</h6>
                        </div>
                        <!-- List group -->
                        <div class="list-group list-group-flush">
                            <a href="#!" class="list-group-item list-group-item-action">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <img alt="Image placeholder" src="img/theme/team-1.jpg"
                                             class="avatar rounded-circle">
                                    </div>
                                    <div class="col ml--2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h4 class="mb-0 text-sm">John Snow</h4>
                                            </div>
                                            <div class="text-right text-muted">
                                                <small>2 hrs ago</small>
                                            </div>
                                        </div>
                                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#!" class="list-group-item list-group-item-action">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <img alt="Image placeholder" src="img/theme/team-2.jpg"
                                             class="avatar rounded-circle">
                                    </div>
                                    <div class="col ml--2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h4 class="mb-0 text-sm">John Snow</h4>
                                            </div>
                                            <div class="text-right text-muted">
                                                <small>3 hrs ago</small>
                                            </div>
                                        </div>
                                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#!" class="list-group-item list-group-item-action">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <img alt="Image placeholder" src="img/theme/team-3.jpg"
                                             class="avatar rounded-circle">
                                    </div>
                                    <div class="col ml--2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h4 class="mb-0 text-sm">John Snow</h4>
                                            </div>
                                            <div class="text-right text-muted">
                                                <small>5 hrs ago</small>
                                            </div>
                                        </div>
                                        <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#!" class="list-group-item list-group-item-action">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <img alt="Image placeholder" src="img/theme/team-4.jpg"
                                             class="avatar rounded-circle">
                                    </div>
                                    <div class="col ml--2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h4 class="mb-0 text-sm">John Snow</h4>
                                            </div>
                                            <div class="text-right text-muted">
                                                <small>2 hrs ago</small>
                                            </div>
                                        </div>
                                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#!" class="list-group-item list-group-item-action">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <img alt="Image placeholder" src="img/theme/team-5.jpg"
                                             class="avatar rounded-circle">
                                    </div>
                                    <div class="col ml--2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h4 class="mb-0 text-sm">John Snow</h4>
                                            </div>
                                            <div class="text-right text-muted">
                                                <small>3 hrs ago</small>
                                            </div>
                                        </div>
                                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- View all -->
                        <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
                    </template>
                </base-dropdown>
                <base-dropdown menu-classes="dropdown-menu-lg dropdown-menu-dark bg-default dropdown-menu-right"
                               class="nav-item"
                               tag="li"
                               title-tag="a"
                               title-classes="nav-link"
                               icon="fas fa-tools">
                    <template>
                        <div class="row shortcuts px-4">
                            <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                      <i class="ni ni-calendar-grid-58"></i>
                    </span>
                                <small>Calendar</small>
                            </a>
                            <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                      <i class="ni ni-email-83"></i>
                    </span>
                                <small>Email</small>
                            </a>
                            <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                      <i class="ni ni-credit-card"></i>
                    </span>
                                <small>Payments</small>
                            </a>
                            <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                      <i class="ni ni-books"></i>
                    </span>
                                <small>Reports</small>
                            </a>
                            <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                      <i class="ni ni-pin-3"></i>
                    </span>
                                <small>Maps</small>
                            </a>
                            <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                      <i class="ni ni-basket"></i>
                    </span>
                                <small>Shop</small>
                            </a>
                        </div>
                    </template>
                </base-dropdown>
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
                        <a href="#!" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>My profile</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                            <i class="ni ni-settings-gear-65"></i>
                            <span>Settings</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                            <i class="ni ni-calendar-grid-58"></i>
                            <span>Activity</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                            <i class="ni ni-support-16"></i>
                            <span>Support</span>
                        </a>
                        <div class="dropdown-divider"></div>
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
                        :class="{'active' : $route.path.indexOf('dashboard/users') > -1}"
                    >
                        <router-link to="/dashboard/users" class="nav-link">
                            <i class="fas fa-user-tie"></i> {{ $t('users') }}
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
