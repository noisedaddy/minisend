<!--<template>-->
<!--    <div>-->
<!--        <div class="container-fluid">-->
<!--            <div class="row">-->
<!--                <div-->
<!--                    class="col-sm-12"-->
<!--                    :class="{-->
<!--                        'col-md-9' : showFilters && !displayedAddEditForm,-->
<!--                        'col-md-6' : !!displayedAddEditForm-->
<!--                    }"-->
<!--                >-->
<!--                    <div class="card">-->
<!--                        <div class="card-header">-->
<!--                            <div class="row">-->
<!--                                <div class="col-6">-->
<!--                                    <h3 class="mb-0">{{$t('users')}}</h3>-->
<!--                                </div>-->
<!--                                <div class="col-6 text-right">-->
<!--                                    <base-button-->
<!--                                            v-show="!displayedAddEditForm"-->
<!--                                            icon-->
<!--                                            :type="showFilters ? 'default' : 'secondary'"-->
<!--                                            size="sm"-->
<!--                                            @click="showFilters = !showFilters"-->
<!--                                    >-->
<!--                                        <span class="btn-inner&#45;&#45;icon"><i class="fas fa-filter"></i></span>-->
<!--                                        <span class="btn-inner&#45;&#45;text">{{$t('filters')}}</span>-->
<!--                                    </base-button>-->
<!--                                    <router-link v-show="!displayedAddEditForm" to="/dashboard/users/create">-->
<!--                                        <base-button icon type="primary" size="sm">-->
<!--                                            <span class="btn-inner&#45;&#45;icon"><i class="fas fa-user-plus"></i></span>-->
<!--                                            <span class="btn-inner&#45;&#45;text">{{$t('newUser')}}</span>-->
<!--                                        </base-button>-->
<!--                                    </router-link>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <user-list-table-->
<!--                                v-show="!isLoading"-->
<!--                                ref="table"-->
<!--                                :users="users.data"-->
<!--                                :meta="users.meta"-->
<!--                                @rowClicked="rowClicked"-->
<!--                        >-->
<!--                        </user-list-table>-->

<!--                        <base-loading v-show="isLoading">-->
<!--                        </base-loading>-->
<!--                    </div>-->
<!--                </div>-->

<!--                <div-->
<!--                        v-show="showFilters && !displayedAddEditForm"-->
<!--                        class="col-sm-12 col-md-3"-->
<!--                >-->
<!--                    <user-list-filters-->
<!--                            v-model="filters"-->
<!--                    >-->
<!--                    </user-list-filters>-->
<!--                </div>-->

<!--                <div-->
<!--                        v-if="displayedAddEditForm"-->
<!--                        class="col-sm-12 col-md-6"-->
<!--                >-->
<!--                    <router-view>-->

<!--                    </router-view>-->
<!--                </div>-->

<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</template>-->
<!--<script>-->
<!--    import UserListTable from '../Components/UserListTable';-->
<!--    import UserListFilters from '../Components/UserListFilters'-->
<!--    import UsersAPI from '@services/api/UsersAPI'-->
<!--    import BaseLoading from "@/shared/BaseLoading";-->

<!--    export default {-->
<!--        name: "ListUsersIndex",-->
<!--        components: {-->
<!--            BaseLoading,-->
<!--            UserListTable,-->
<!--            UserListFilters,-->
<!--        },-->
<!--        data() {-->
<!--            return {-->
<!--                isLoading: true,-->
<!--                users: {data: [], meta: {}},-->
<!--                activeRow: null,-->
<!--                showFilters: false,-->
<!--                filters: {-->
<!--                    role: ['sender', 'recipient', 'subject'],-->
<!--                    roleOptions: [-->
<!--                        {-->
<!--                        value: 'sender',-->
<!--                        label: 'Sender'-->
<!--                    }, {-->
<!--                        value: 'recipient',-->
<!--                        label: 'Recipient'-->
<!--                    }, {-->
<!--                        value: 'subject',-->
<!--                        label: 'Subject'-->
<!--                    }-->
<!--                    ],-->
<!--                    selects: {-->
<!--                        simple: ''-->
<!--                    },-->
<!--                }-->
<!--            }-->
<!--        },-->
<!--        computed: {-->
<!--            displayedAddEditForm() {-->
<!--                return this.activeRow || this.$route.path === '/dashboard/users/create';-->
<!--            }-->
<!--        },-->
<!--        watch: {-->
<!--            $route() {-->
<!--                if (this.$route.path === '/dashboard/users') {-->
<!--                    this.activeRow = null;-->
<!--                    this.$refs.table.setActiveRow(null);-->
<!--                }-->
<!--            }-->
<!--        },-->
<!--        mounted() {-->
<!--            this.fetchUsers();-->
<!--            if (this.$route.params.userId) {-->
<!--                const row = {id: parseInt(this.$route.params.userId)};-->
<!--                this.$refs.table.setActiveRow(row);-->
<!--                this.activeRow = row;-->
<!--            }-->
<!--        },-->
<!--        methods: {-->
<!--            async fetchUsers() {-->
<!--                this.isLoading = true;-->
<!--                this.users = await UsersAPI.getAll();-->
<!--                this.isLoading = false;-->
<!--            },-->
<!--            rowClicked(row) {-->
<!--                this.activeRow = row;-->

<!--                if (row) {-->
<!--                    this.$router.push(`/dashboard/users/${row.id}`)-->
<!--                } else {-->
<!--                    this.$router.push(`/dashboard/users`)-->
<!--                }-->
<!--            }-->
<!--        }-->
<!--    };-->
<!--</script>-->
<!--<style></style>-->
