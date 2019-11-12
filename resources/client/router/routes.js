import Home from '@src/Home';
import NotFound from "@shared/NotFound";
import AuthLayout from "@src/Auth/AuthLayout"
import Login from "@src/Auth/Login"
import DashboardLayout from "@src/Dashboard/DashboardLayout";
import Overview from "@src/Dashboard/Overview/Overview";

export default [
    {path: '/', component: Home},
    {
        path: '/auth',
        component: AuthLayout,
        redirect: '/auth/login',
        children: [
            {
                path: 'login',
                component: Login
            },
            // {
            //     path: 'forgot-password',
            //     component: ForgotPassword
            // }
        ],
    },
    {
        path: '/dashboard',
        redirect: '/dashboard/overview',
        component: DashboardLayout,
        children: [
            {
                path: 'overview',
                component: Overview
            }
        ],
    },
    {path: '*', component: NotFound}
];
