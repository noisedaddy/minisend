<template>
    <div>
        <div class="container-fluid mt-2">
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
    import UserListTable from '../Components/UserListTable';
    import Tabs from '@argon/components/Tabs/Tabs';
    import Tab from '@argon/components/Tabs/Tab';

    export default {
        name: "ListUsersIndex",
        components: {
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
