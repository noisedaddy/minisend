<template>
    <div>
        <base-header class="pb-6" type="">
            <div class="row align-items-center pb-4">
                <div class="col-6">
                    <h6 class="h2 d-inline-block mb-0">Create New User</h6>
                </div>
                <div class="col-6 text-right">
                    <router-link to="/dashboard/users/list">
                        <base-button icon type="white" size="sm">
                            <span class="btn-inner--icon"><i class="fas fa-arrow-circle-left"></i></span>
                            <span class="btn-inner--text">Back</span>
                        </base-button>
                    </router-link>
                </div>
            </div>
        </base-header>

        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-12">
                    <add-edit-form></add-edit-form>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    import BaseHeader from '@argon/components/BaseHeader';
    import AddEditForm from '../Components/AddEditForm'

    export default {
        name: "CreateUsersIndex",
        components: {
            BaseHeader,
            AddEditForm,
        },
        data() {
            return {};
        }
    };
</script>
<style></style>
