import Home from '@src/Home';
import NotFound from "@shared/NotFound";
import AuthLayout from "@src/Auth/AuthLayout"
import Login from "@src/Auth/Login"
import DashboardLayout from "@src/Dashboard/DashboardLayout";
import OverviewIndex from "@src/Dashboard/Overview/Index";
import UsersIndex from "@src/Dashboard/Users/List/Index"
import UsersCreate from "@src/Dashboard/Users/Create/Index"

export default [
    {path: '/', component: Home},
    {
        path: '/auth',
        component: AuthLayout,
        redirect: '/auth/login',
        children: [
            {
                path: 'login',
                component: Login,
                meta: {
                    title: "Login",
                }
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
            /**
             * DASHBOARD
             */
            {
                path: 'overview',
                component: OverviewIndex,
                meta: {
                    title: "Dashboard",
                }
            },

            /**
             * USERS
             */
            {
                path: 'users/list',
                component: UsersIndex,
                meta: {
                    title: "Users",
                }
            },
            {
                path: 'users/create',
                component: UsersCreate,
                meta: {
                    title: "Create a user",
                }
            }
        ],
    },
    {path: '*', component: NotFound}
];
