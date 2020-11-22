<template>
    <div>
        <el-table
            class="table-responsive table-flush"
            header-row-class-name="thead-light"
            row-key="id"
            :data="emails"
            :row-class-name="rowClasses"
            @row-click="rowClicked"
        >
            <el-table-column label="ID"
                             prop="id"
                             sortable
            >
            </el-table-column>
            <el-table-column label="Sender"
                             prop="sender"
                             min-width="200px"
                             sortable>
            </el-table-column>
            <el-table-column label="Recipient"
                             prop="recipient"
                             min-width="120px"
                             sortable>
            </el-table-column>
            <el-table-column label="Subject"
                             prop="subject"
                             min-width="120px"
                             sortable>
            </el-table-column>
            <el-table-column label="Text Content"
                             prop="text_content"
                             min-width="120px"
                             sortable>
            </el-table-column>
            <el-table-column label="Status"
                             prop="status"
                             min-width="120px"
                             sortable>
            </el-table-column>
        </el-table>
        <div
            slot="footer"
            class="col-12 mt-3 d-flex justify-content-center justify-content-sm-between flex-wrap"
        >
            <div class="">
                <p class="card-category">
                    Showing {{ pagination.from }} to {{ pagination.to }} of {{ pagination.total }} entries

                </p>

            </div>
            <base-server-side-pagination v-if="pagination.last_page > 1" :pagination="pagination" :offset="pagination.per_page" @paginate="fetchEmails()"></base-server-side-pagination>
        </div>
    </div>
</template>

<script>
    import {
        Table,
        TableColumn,
        DropdownMenu,
        DropdownItem,
        Dropdown
    } from 'element-ui'
    import EmailAPI from '../../../../services/api/EmailAPI'
    import BaseServerSidePagination from '../../../../shared/BaseServerSidePagination'

    export default {
        name: "EmailListTable",
        props: ['emails'],
        components: {
            [Table.name]: Table,
            [TableColumn.name]: TableColumn,
            [Dropdown.name]: Dropdown,
            [DropdownItem.name]: DropdownItem,
            [DropdownMenu.name]: DropdownMenu,
            BaseServerSidePagination,
        },
        data() {
            return {
                // emails: [],
                selectedRows: [],
                activeRow: null,
                pagination: {
                    'current_page': 1
                }
            }
        },
        methods: {
            rowClicked(row) {
                if (this.activeRow && this.activeRow.id === row.id) {
                    this.activeRow = null;
                } else {
                    this.activeRow = row;
                }

                this.$emit('rowClicked', this.activeRow);
            },
            async fetchEmails(endpt = `emails?page=${this.pagination.current_page}`) {
                const res = await EmailAPI.getAll(endpt);
                this.pagination = res.meta;
                this.emails = res.data;
            },
            rowClasses({row, rowIndex}) {
                let classes = 'clickable';

                if (this.activeRow && this.activeRow.id === row.id) {
                    classes += ' activeTableRow'
                }

                return classes;
            },
            setActiveRow(row) {
                this.activeRow = row;
            }
        },
        mounted() {
            this.fetchEmails();
        },
    }
</script>

<style scoped>

</style>
