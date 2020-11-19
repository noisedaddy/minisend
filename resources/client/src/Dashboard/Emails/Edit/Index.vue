<template>
    <div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h3 class="mb-0">Details</h3>
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
            <add-edit-form v-show="!isLoading" :email="email" :attachments="attachments"></add-edit-form>
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
        },
        name: "EditEmailsIndex",
        components: {
            AddEditForm,
        },
        data() {
            return {
                isLoading: true,
                email : {},
                attachments: []
            };
        },
        methods: {
            async getEmailDetails() {
                this.isLoading = true;
                this.email = await EmailAPI.getEmailDetails(this.$route.params.emailId);
                console.log(JSON.stringify(this.email));
                for (var i = 0; i < this.email.attachments.length; i++) {
                    this.attachments[i] = this.email.attachments[i].name;
                }
                console.log(this.attachments);
                this.isLoading = false;
            }
        }
    };
</script>
<style></style>
