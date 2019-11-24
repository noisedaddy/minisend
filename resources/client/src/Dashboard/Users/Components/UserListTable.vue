<template>
    <div>
        <el-table
            class="table-responsive table-flush"
            header-row-class-name="thead-light"
            row-key="id"
            :data="users"
            :row-class-name="rowClasses"
            @row-click="rowClicked"
        >
            <el-table-column label="ID"
                             prop="id"
                             sortable
            >
            </el-table-column>
            <el-table-column label="User"
                             min-width="220px"
                             prop="display_name"
                             sortable>
                <template v-slot="{row}">
                    <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                            <img alt="User avatar" :src="row.avatar || '/img/empty_user.png'">
                        </a>
                        <div class="media-body">
                            <span class="font-weight-600 name mb-0 text-sm">{{row.display_name}}</span>
                        </div>
                    </div>
                </template>
            </el-table-column>
            <el-table-column label="Email"
                             prop="email"
                             min-width="200px"
                             sortable>
            </el-table-column>
            <el-table-column label="Last login"
                             prop="last_login"
                             min-width="120px"
                             sortable>
            </el-table-column>
            <el-table-column label="Entered"
                             prop="first_login"
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
            <base-server-side-pagination v-if="pagination.last_page > 1" :pagination="pagination" :offset="pagination.per_page" @paginate="fetchUsers()"></base-server-side-pagination>
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
    import UsersAPI from '../../../../services/api/UsersAPI'
    import BaseServerSidePagination from '../../../../shared/BaseServerSidePagination'

    export default {
        name: "UserListTable",
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
                users: [],
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
            async fetchUsers(endpt = `users?page=${this.pagination.current_page}`) {
                const res = await UsersAPI.getAll(endpt);
                this.pagination = res.meta;
                this.users = res.data;
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
            this.fetchUsers();
        },
    }
</script>

<style scoped>

</style>
