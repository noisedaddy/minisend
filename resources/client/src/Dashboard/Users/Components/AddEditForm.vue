<!--<template>-->
<!--    <div>-->
<!--    <div class="card-body">-->
<!--        <div class="row">-->
<!--            <form role="form" class="col-md-12">-->
<!--            <div class="col-md-8">-->
<!--                    <div class="form-group row">-->
<!--                        <label class="col-md-3 col-form-label form-control-label">First Name</label>-->
<!--                        <div class="col-md-9">-->
<!--&lt;!&ndash;                            <base-input placeholder="First Name">{{ user ? user.first_name : null  }}</base-input>&ndash;&gt;-->
<!--                            <base-input placeholder="Sender"  v-if="user" :value="user.first_name" disabled="true"></base-input>-->
<!--                            <base-input placeholder="Sender"  v-model="first_name" v-else></base-input>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="form-group row">-->
<!--                        <label class="col-md-3 col-form-label form-control-label">Last Name</label>-->
<!--                        <div class="col-md-9">-->
<!--                            <base-input placeholder="Recipient" v-if="user" :value="user.last_name" disabled="true"></base-input>-->
<!--                            <base-input placeholder="Recipient"  v-model="last_name" v-else></base-input>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="form-group row">-->
<!--                        <label class="col-md-3 col-form-label form-control-label">Email</label>-->
<!--                        <div class="col-md-9">-->
<!--                            <base-input placeholder="Subject" v-if="user" :value="user.email" disabled="true"></base-input>-->
<!--                            <base-input placeholder="Subject"  v-model="email" v-else></base-input>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                <div class="form-group row">-->
<!--                    <label class="col-md-3 col-form-label form-control-label">Email</label>-->
<!--                    <div class="col-md-9">-->
<!--                        <base-input placeholder="Text Content" v-if="user" :value="user.email" disabled="true"></base-input>-->
<!--                        <base-input placeholder="Text Content"  v-model="email" v-else></base-input>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="form-group row">-->
<!--                    <label class="col-md-3 col-form-label form-control-label">Email</label>-->
<!--                    <div class="col-md-9">-->
<!--                        <base-input placeholder="HTML Content" v-if="user" :value="user.email" disabled="true"></base-input>-->
<!--                        <base-input placeholder="HTML Content"  v-model="email" v-else></base-input>-->
<!--                    </div>-->
<!--                </div>-->
<!--&lt;!&ndash;                    <div class="form-group row">&ndash;&gt;-->
<!--&lt;!&ndash;                        <label for="example-tel-input" class="col-md-3 col-form-label form-control-label">Phone&ndash;&gt;-->
<!--&lt;!&ndash;                            Number</label>&ndash;&gt;-->
<!--&lt;!&ndash;                        <div class="col-md-9">&ndash;&gt;-->
<!--&lt;!&ndash;                            <base-input type="tel" placeholder="Phone number" id="example-tel-input"/>&ndash;&gt;-->
<!--&lt;!&ndash;                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                    <div class="form-group row">&ndash;&gt;-->
<!--&lt;!&ndash;                        <label class="col-md-3 col-form-label form-control-label">Address</label>&ndash;&gt;-->
<!--&lt;!&ndash;                        <div class="col-md-9">&ndash;&gt;-->
<!--&lt;!&ndash;                            <base-input placeholder="Address"></base-input>&ndash;&gt;-->
<!--&lt;!&ndash;                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                    <div class="form-group row">&ndash;&gt;-->
<!--&lt;!&ndash;                        <label class="col-md-3 col-form-label form-control-label">Postion</label>&ndash;&gt;-->
<!--&lt;!&ndash;                        <div class="col-md-9">&ndash;&gt;-->
<!--&lt;!&ndash;                            <base-input placeholder="Position"></base-input>&ndash;&gt;-->
<!--&lt;!&ndash;                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                    </div>&ndash;&gt;-->
<!--            </div>-->
<!--                <div class="form-group row">-->
<!--                    <label class="col-md-3 col-form-label form-control-label">Attachment</label>-->
<!--                    <div class="col-md-9">-->
<!--                        <file-input v-model="fileSingle" id="avatar-upload"></file-input>-->
<!--                        <label for="avatar-upload" class="mt-2"> JPG or PNG; max: 1MB</label>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="form-group row">-->
<!--                    <base-button type="primary"-->
<!--                                 class="my-4"-->
<!--                                 @click="sendEmail">-->
<!--                        {{ $t('Send') }}-->
<!--                    </base-button>-->
<!--                </div>-->
<!--            </form>-->

<!--        </div>-->
<!--    </div>-->

<!--    </div>-->
<!--</template>-->

<!--<script>-->
<!--    import FileInput from '@argon/components/Inputs/FileInput'-->
<!--    import UsersAPI from "@services/api/UsersAPI";-->

<!--    export default {-->
<!--        mounted() {-->
<!--            // console.log('AddEditForm '+JSON.stringify(this.user));-->
<!--        },-->
<!--        name: "AddEditForm",-->
<!--        props: ["user"],-->
<!--        components: {-->
<!--            FileInput,-->
<!--        },-->
<!--        data() {-->
<!--            return {-->
<!--                first_name: '',-->
<!--                last_name: '',-->
<!--                email: '',-->
<!--                fileSingle: []-->
<!--            }-->
<!--        },-->
<!--        methods: {-->
<!--            sendEmail() {-->
<!--                UsersAPI-->
<!--                    .sendEmail(this.first_name, this.last_name, this.email)-->
<!--                    .then((data) => {-->
<!--                        console.log(data);-->
<!--                        this.$router.push('/dashboard/overview');-->
<!--                    })-->
<!--                    .catch((err) => {-->
<!--                        console.log(err);-->
<!--                    })-->
<!--            }-->
<!--        }-->
<!--    }-->
<!--</script>-->

<!--<style scoped>-->

<!--</style>-->
