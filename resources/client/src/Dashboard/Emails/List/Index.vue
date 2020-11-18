<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div
                    class="col-sm-12"
                    :class="{
                        'col-md-9' : showFilters && !displayedAddEditForm,
                        'col-md-6' : !!displayedAddEditForm
                    }"
                >
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h3 class="mb-0">{{$t('emails')}}</h3>
                                </div>
                                <div class="col-6 text-right">
                                    <base-button
                                        v-show="!displayedAddEditForm"
                                        icon
                                        :type="showFilters ? 'default' : 'secondary'"
                                        size="sm"
                                        @click="showFilters = !showFilters"
                                    >
                                        <span class="btn-inner--icon"><i class="fas fa-filter"></i></span>
                                        <span class="btn-inner--text">{{$t('filters')}}</span>
                                    </base-button>
                                    <router-link v-show="!displayedAddEditForm" to="/dashboard/emails/create">
                                        <base-button icon type="primary" size="sm">
                                            <span class="btn-inner--icon"><i class="fas fa-user-plus"></i></span>
                                            <span class="btn-inner--text">{{$t('newEmail')}}</span>
                                        </base-button>
                                    </router-link>
                                </div>
                            </div>
                        </div>

                        <email-list-table
                            v-show="!isLoading"
                            ref="table"
                            :emails="emails.data"
                            :meta="emails.meta"
                            @rowClicked="rowClicked"
                        >
                        </email-list-table>

                        <base-loading v-show="isLoading">
                        </base-loading>
                    </div>
                </div>

                <div
                    v-show="showFilters && !displayedAddEditForm"
                    class="col-sm-12 col-md-3"
                >
                    <email-list-filters
                        v-model="filters"
                    >
                    </email-list-filters>
                </div>

                <div
                    v-if="displayedAddEditForm"
                    class="col-sm-12 col-md-6"
                >
                    <router-view>

                    </router-view>
                </div>

            </div>
        </div>
    </div>
</template>
<script>
    import EmailListTable from '../Components/EmailListTable';
    import EmailListFilters from '../Components/EmailListFilters'
    import BaseLoading from "@/shared/BaseLoading";
    import EmailAPI from "@services/api/EmailAPI";
    // import EmailListTable from "@src/Dashboard/Emails/Components/EmailListTable";

    export default {
        name: "ListEmailsIndex",
        components: {
            BaseLoading,
            EmailListTable,
            EmailListFilters,
        },
        data() {
            return {
                isLoading: true,
                emails: {data: [], meta: {}},
                activeRow: null,
                showFilters: false,
                filters: {
                    role: ['sender', 'recipient', 'subject'],
                    roleOptions: [
                        {
                            value: 'sender',
                            label: 'Sender'
                        }, {
                            value: 'recipient',
                            label: 'Recipient'
                        }, {
                            value: 'subject',
                            label: 'Subject'
                        }
                    ],
                    selects: {
                        simple: ''
                    },
                }
            }
        },
        computed: {
            displayedAddEditForm() {
                return this.activeRow || this.$route.path === '/dashboard/emails/create';
            }
        },
        watch: {
            $route() {
                if (this.$route.path === '/dashboard/emails') {
                    this.activeRow = null;
                    this.$refs.table.setActiveRow(null);
                }
            }
        },
        mounted() {
            this.fetchUsers();
            if (this.$route.params.emailId) {
                const row = {id: parseInt(this.$route.params.emailId)};
                this.$refs.table.setActiveRow(row);
                this.activeRow = row;
            }
        },
        methods: {
            async fetchUsers() {
                this.isLoading = true;
                this.users = await EmailAPI.getAll();
                this.isLoading = false;
            },
            rowClicked(row) {
                this.activeRow = row;

                if (row) {
                    this.$router.push(`/dashboard/emails/${row.id}`)
                } else {
                    this.$router.push(`/dashboard/emails`)
                }
            }
        }
    };
</script>
<style></style>
