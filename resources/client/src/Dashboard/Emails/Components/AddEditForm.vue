<template>
    <div>
        <div class="card-body">
            <div class="row">
                <form role="form" class="col-md-12">
                    <div class="col-md-8">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label form-control-label">Sender</label>
                            <div class="col-md-9">
                                <!--                            <base-input placeholder="First Name">{{ user ? user.first_name : null  }}</base-input>-->
                                <base-input placeholder="Sender"  v-if="email" :value="email.sender" disabled="true"></base-input>
                                <base-input placeholder="Sender"  v-model="sender" v-else></base-input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label form-control-label">Recipient</label>
                            <div class="col-md-9">
                                <base-input placeholder="Recipient" v-if="email" :value="email.recipient" disabled="true"></base-input>
                                <base-input placeholder="Recipient"  v-model="recipient" v-else></base-input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label form-control-label">Subject</label>
                            <div class="col-md-9">
                                <base-input placeholder="Subject" v-if="email" :value="email.subject" disabled="true"></base-input>
                                <base-input placeholder="Subject"  v-model="subject" v-else></base-input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label form-control-label">Text Content</label>
                            <div class="col-md-9">
                                <base-input placeholder="Text Content" v-if="email" :value="email.text_content" disabled="true"></base-input>
                                <base-input placeholder="Text Content"  v-model="text_content" v-else></base-input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label form-control-label">HTML Content</label>
                            <div class="col-md-9">
                                <base-input placeholder="HTML Content" v-if="email" :value="email.html_content" disabled="true"></base-input>
                                <base-input placeholder="HTML Content"  v-model="html_content" v-else></base-input>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label form-control-label">Attachment</label>
                        <div class="col-md-9">
                            <file-input v-model="fileSingle" id="avatar-upload"></file-input>
                            <label for="avatar-upload" class="mt-2"> JPG or PNG; max: 1MB</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <base-button type="primary"
                                     class="my-4"
                                     @click="sendEmail">
                            {{ $t('Send') }}
                        </base-button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</template>

<script>
    import FileInput from '@argon/components/Inputs/FileInput'
    import UsersAPI from "@services/api/UsersAPI";
    import EmailAPI from "@services/api/EmailAPI";

    export default {
        mounted() {
            // console.log('AddEditForm '+JSON.stringify(this.user));
        },
        name: "AddEditForm",
        props: ["email"],
        components: {
            FileInput,
        },
        data() {
            return {
                sender: '',
                recipient: '',
                subject: '',
                text_content:'',
                html_content: '',
                fileSingle: []
            }
        },
        methods: {
            sendEmail() {
                EmailAPI
                    .sendEmail(this.sender, this.recipient, this.subject,this.text_content, this.html_content)
                    .then((data) => {
                        console.log(data);
                        this.$router.push('/dashboard/emails');
                    })
                    .catch((err) => {
                        console.log(err);
                    })
            }
        }
    }
</script>

<style scoped>

</style>
