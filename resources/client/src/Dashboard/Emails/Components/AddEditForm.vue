<template>
    <div>
        <div class="card-body">
            <div class="row">
                <form role="form" class="col-md-12" enctype="multipart/form-data">
                    <div class="col-md-8">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label form-control-label">Sender</label>
                            <div class="col-md-9">
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
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label form-control-label">Attachments</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" v-if="email" disabled="true">
                                <input type="file" class="form-control" v-on:change="onFileChange" v-else>
                                <label for="file" class="mt-2"> jpeg,png,jpg,gif,svg MAX: 1MB</label>
                            </div>
                            <div class="col-md-9" id="attachments_detail">
                                <ul>
                                    <li v-model="attachments" v-for="i in attachments" v-bind:key="i.id">{{i}}</li>
                                </ul>
                            </div>
                            <div class="col-md-9" id="attachments_add">
                                <ul>
                                    <li v-model="items" v-for="i in items" v-bind:key="i.name">{{i.name}}<span @click="clickDelete(i.name)"><b>  Delete</b></span></li>
                                </ul>
                            </div>
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
    import EmailAPI from "@services/api/EmailAPI";

    export default {
        mounted() {
            this.array = {};
        },
        name: "AddEditForm",
        props: ["email","attachments"],
        data() {
            return {
                sender: '',
                recipient: '',
                subject: '',
                text_content:'',
                html_content: '',
                file: '',
                uniqueID : '',
                items:[]
            }
        },
        created() {
            this.uniqueID = this.randomStr(20, '123456789abcdefghijklmnopqrstuvwxyz');
            console.log('Created '+this.uniqueID);
        },
        methods: {
            sendEmail() {
                EmailAPI
                    .sendEmail(this.sender, this.recipient, this.subject, this.text_content, this.html_content, this.uniqueID, this.items)
                    .then((data) => {
                        console.log(data);
                        this.$router.go({path:this.$router.path});

                    })
                    .catch((err) => {
                        console.log(err);
                    })
            },
            onFileChange(e){
                this.file = e.target.files[0];
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                let formData = new FormData();
                formData.append('file', this.file);
                formData.append('uniqueID', this.uniqueID);

                EmailAPI
                    .uploadFiles(formData, config)
                    .then((data) => {
                        this.items.push({
                                    'name':data.data.success,
                                    'path':data.data.path
                                });


                        console.log(this.items);
                    })
                    .catch((err) => {
                        console.log(err);
                    })

            },
            randomStr(len, arr){
                var ans = '';
                for (var i = len; i > 0; i--) {
                    ans +=
                        arr[Math.floor(Math.random() * arr.length)];
                }
                return ans;
            },
            clickDelete: function(name){
                EmailAPI
                    .deleteFiles(name, this.uniqueID)
                    .then((res) => {
                        console.log(res);
                        this.items = res.data;
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
