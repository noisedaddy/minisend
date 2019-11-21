<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-3">
                    <user-list-filters></user-list-filters>
                </div>
                <div class="col-sm-12 col-md-9">
                    <user-list-table></user-list-table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import UserListTable from '../Components/UserListTable';
    import UserListFilters from '../Components/UserListFilters'

    export default {
        name: "ListUsersIndex",
        components: {
            UserListTable,
            UserListFilters,
        },
    };
</script>
<style></style>
