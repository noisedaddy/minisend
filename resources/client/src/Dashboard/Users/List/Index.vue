<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-header">
                            <h3>Filters</h3>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <user-list-table></user-list-table>
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
            UserListTable,
        },
        data() {
            return {};
        }
    };
</script>
<style></style>
