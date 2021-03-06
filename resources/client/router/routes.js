import Home from '@src/Home';
import NotFound from "@shared/NotFound";
import AuthLayout from "@src/Auth/AuthLayout"
import Login from "@src/Auth/Login"
import DashboardLayout from "@src/Dashboard/DashboardLayout";
import OverviewIndex from "@src/Dashboard/Overview/Index";
import EmailsIndex from "@src/Dashboard/Emails/List/Index"
import EmailsCreate from "@src/Dashboard/Emails/Create/Index"
import EmailsEdit from "@src/Dashboard/Emails/Edit/Index"

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
             * EMAILS
             */
            {
                path: 'emails',
                component: EmailsIndex,
                meta: {
                    title: "Emails",
                },
                children: [
                    {
                        path: 'create',
                        component: EmailsCreate,
                        meta: {
                            title: "Create email",
                        }
                    },
                    {
                        path: ':emailId',
                        component: EmailsEdit,
                        meta: {
                            title: "Email Detail",
                        }
                    }
                ]
            },
        ],
    },
    {path: '*', component: NotFound}
];
