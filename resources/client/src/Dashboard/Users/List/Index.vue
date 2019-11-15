<template>
    <div>
        <base-header class="pb-6" type="">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                        <ol class="breadcrumb breadcrumb-links">
                            <li class="breadcrumb-item">
                                <router-link to="/"><i class="fas fa-home"></i></router-link>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </base-header>

        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-12">
                    <h1>Users - View All</h1>
                    <tabs tabNavClasses="nav-fill flex-column flex-sm-row">
                        <tab-pane title="Admin">
                            <user-list-table class="mt-4"></user-list-table>
                        </tab-pane>
                        <tab-pane title="Client Admins">
                            <user-list-table class="mt-4"></user-list-table>
                        </tab-pane>
                        <tab-pane title="Client Sub Admins">
                            <user-list-table class="mt-4"></user-list-table>
                        </tab-pane>
                        <tab-pane title="Evaluators">
                            <user-list-table class="mt-4"></user-list-table>
                        </tab-pane>
                    </tabs>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    import BaseHeader from '@argon/components/BaseHeader';
    import UserListTable from './components/UserListTable';
    import Tabs from '@argon/components/Tabs/Tabs';
    import Tab from '@argon/components/Tabs/Tab';

    export default {
        name: "ListUsersIndex",
        components: {
            BaseHeader,
            Tabs,
            [Tab.name]: Tab,
            UserListTable,
        },
        data() {
            return {};
        }
    };
</script>
<style></style>
