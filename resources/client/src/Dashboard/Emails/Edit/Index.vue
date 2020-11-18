<template>
    <div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h3 class="mb-0">Edit Email</h3>
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
            <add-edit-form v-show="!isLoading" :email="email"></add-edit-form>
        </div>
    </div>
</template>
<script>
    import AddEditForm from '../Components/AddEditForm'
    import UsersAPI from "@services/api/EmailAPI";
    import EmailAPI from "@services/api/EmailAPI";

    export default {
        mounted() {
            this.getEmailDetails();
            console.log('EditUsersIndex '+this.$route.params.emailId);
        },
        name: "EditEmailsIndex",
        components: {
            AddEditForm,
        },
        data() {
            return {
                isLoading: true,
                email : {}
            };
        },
        methods: {
            async getEmailDetails() {
                this.isLoading = true;
                this.email = await EmailAPI.getEmailDetails(this.$route.params.emailId);
                console.log('ListIndex(getEmailDetails) '+JSON.stringify(this.email));
                this.isLoading = false;
            }
        }
    };
</script>
<style></style>
