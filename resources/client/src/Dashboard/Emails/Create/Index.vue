<template>
    <div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h3 class="mb-0">Create New Email</h3>
                    </div>
                    <div class="col-6 text-right">
                        <router-link to="/dashboard/emails">
                            <base-button icon type="primary" size="sm">
                                <span class="btn-inner--icon"><i class="fas fa-chevron-left"></i></span>
                                <span class="btn-inner--text">Cancel</span>
                            </base-button>
                        </router-link>
                    </div>
                </div>
            </div>
            <add-edit-form></add-edit-form>
        </div>
    </div>
</template>
<script>
    import AddEditForm from '../Components/AddEditForm'

    export default {
        name: "CreateEmailsIndex",
        components: {
            AddEditForm,
        },
        data() {
            return {};
        }
    };
</script>
<style></style>
