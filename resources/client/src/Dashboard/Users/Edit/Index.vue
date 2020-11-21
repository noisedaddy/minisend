<!--<template>-->
<!--    <div>-->
<!--        <div class="card">-->
<!--            <div class="card-header">-->
<!--                <div class="row">-->
<!--                    <div class="col-6">-->
<!--                        <h3 class="mb-0">Edit User</h3>-->
<!--                    </div>-->
<!--                    <div class="col-6 text-right">-->
<!--                        <router-link to="/dashboard/users">-->
<!--                            <base-button icon type="primary" size="sm">-->
<!--                                <span class="btn-inner&#45;&#45;icon"><i class="fas fa-chevron-left"></i></span>-->
<!--                                <span class="btn-inner&#45;&#45;text">Cancel</span>-->
<!--                            </base-button>-->
<!--                        </router-link>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--&lt;!&ndash;            <add-edit-form v-model="user" v-bind:key="user.id" :user="user"></add-edit-form>&ndash;&gt;-->
<!--            <add-edit-form v-show="!isLoading" :user="user"></add-edit-form>-->
<!--        </div>-->
<!--    </div>-->
<!--</template>-->
<!--<script>-->
<!--    import AddEditForm from '../Components/AddEditForm'-->
<!--    import UsersAPI from "@services/api/UsersAPI";-->

<!--    export default {-->
<!--        mounted() {-->
<!--            this.getUserDetail();-->
<!--            console.log('EditUsersIndex '+this.$route.params.userId);-->
<!--        },-->
<!--        name: "EditUsersIndex",-->
<!--        components: {-->
<!--            AddEditForm,-->
<!--        },-->
<!--        data() {-->
<!--            return {-->
<!--                isLoading: true,-->
<!--                user : {}-->
<!--            };-->
<!--        },-->
<!--        methods: {-->
<!--            async getUserDetail() {-->
<!--                this.isLoading = true;-->
<!--                this.user = await UsersAPI.getUserDetails(this.$route.params.userId);-->
<!--                console.log('ListIndex(getUserDetail) '+JSON.stringify(this.user));-->
<!--                this.isLoading = false;-->
<!--            }-->
<!--        }-->
<!--    };-->
<!--</script>-->
<!--<style></style>-->
