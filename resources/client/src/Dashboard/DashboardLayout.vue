<template>
    <router-view></router-view>
</template>

<script>
    import AuthService from "@services/auth/AuthService";

    export default {
        name: "DashboardLayout",
        beforeRouteEnter(to, from, next) {
            if (!AuthService.isLoggedIn()) {
                next('/auth/login');
            } else {
                next();
            }
        },
    }
</script>
