<template>
    <div>
        <notifications></notifications>
        <div class="main-content">
            <zoom-center-transition
                :duration="pageTransitionDuration"
                mode="out-in"
            >
                <router-view></router-view>
            </zoom-center-transition>
        </div>

        <footer class="py-5" id="footer-main">
            <div class="container">
                <div class="row align-items-center justify-content-xl-between">
                    <div class="col-xl-6">
                        <div class="copyright text-center text-xl-left text-muted">
                            © {{year}} <a href="https://www.theenglishquiz.com" class="font-weight-bold ml-1" target="_blank">Mailer test</a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link" target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>
<script>
    import { ZoomCenterTransition } from 'vue2-transitions';
    import AuthService from "@services/auth/AuthService";

    export default {
        name: "AuthLayout",
        beforeRouteEnter(to, from, next) {
            if (AuthService.isLoggedIn()) {
                next('/dashboard/overview');
            } else {
                next();
            }
        },
        components: {
            ZoomCenterTransition
        },
        props: {
            backgroundColor: {
                type: String,
                default: 'black'
            }
        },
        data() {
            return {
                showMenu: false,
                menuTransitionDuration: 250,
                pageTransitionDuration: 200,
                year: new Date().getFullYear(),
                pageClass: 'login-page'
            };
        },
        computed: {
            title() {
                return `${this.$route.name} Page`;
            }
        },
        methods: {
            toggleNavbar() {
                document.body.classList.toggle('nav-open');
                this.showMenu = !this.showMenu;
            },
            closeMenu() {
                document.body.classList.remove('nav-open');
                this.showMenu = false;
            },
            setBackgroundColor() {
                document.body.classList.add('bg-default');
            },
            removeBackgroundColor() {
                document.body.classList.remove('bg-default');
            },
            updateBackground() {
                if (!this.$route.meta.noBodyBackground) {
                    this.setBackgroundColor();
                } else {
                    this.removeBackgroundColor()
                }
            }
        },

        beforeDestroy() {
            this.removeBackgroundColor();
        },
        beforeRouteUpdate(to, from, next) {
            // Close the mobile menu first then transition to next page
            if (this.showMenu) {
                this.closeMenu();
                setTimeout(() => {
                    next();
                }, this.menuTransitionDuration);
            } else {
                next();
            }
        },
        watch: {
            $route: {
                immediate: true,
                handler: function () {
                    this.updateBackground()
                }
            }
        }
    };
</script>
<style lang="scss">
    $scaleSize: 0.8;
    @keyframes zoomIn8 {
        from {
            opacity: 0;
            transform: scale3d($scaleSize, $scaleSize, $scaleSize);
        }
        100% {
            opacity: 1;
        }
    }

    .main-content .zoomIn {
        animation-name: zoomIn8;
    }

    @keyframes zoomOut8 {
        from {
            opacity: 1;
        }
        to {
            opacity: 0;
            transform: scale3d($scaleSize, $scaleSize, $scaleSize);
        }
    }

    .main-content .zoomOut {
        animation-name: zoomOut8;
    }
</style>
