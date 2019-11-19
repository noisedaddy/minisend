<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3>{{$t('filters')}}</h3>
                        </div>
                    </div>
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
