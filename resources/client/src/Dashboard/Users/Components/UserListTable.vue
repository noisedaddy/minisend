<template>
    <div class="card">
        <!--
        <div class="mt-3">
            <div class="col-12 d-flex justify-content-center justify-content-sm-between flex-wrap">
                <el-select
                    class="select-primary pagination-select"
                    v-model="pagination.perPage"
                    placeholder="Per page"
                >
                    <el-option
                        class="select-primary"
                        v-for="item in pagination.perPageOptions"
                        :key="item"
                        :label="item"
                        :value="item"
                    >
                    </el-option>
                </el-select>

                <div>
                    <base-input v-model="searchQuery"
                                prepend-icon="fas fa-search"
                                placeholder="Search...">
                    </base-input>
                </div>
            </div>
        </div>
        -->
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-0">Users</h3>
                </div>
                <div class="col-6 text-right">
                    <base-button icon type="primary" size="sm">
                        <span class="btn-inner--icon"><i class="fas fa-user-plus"></i></span>
                        <span class="btn-inner--text">New User</span>
                    </base-button>
                </div>
            </div>
        </div>
        <el-table
            class="table-responsive table-flush"
            header-row-class-name="thead-light"
            :data="users">
            <el-table-column label="ID"
                             min-width="30px"
                             prop="id"
                             sortable>
            </el-table-column>
            <el-table-column label="First Name"
                             prop="firstName"
                             sortable>
            </el-table-column>
            <el-table-column label="Last Name"
                             prop="lastName"
                             sortable>
            </el-table-column>
            <el-table-column label="Email"
                             prop="email"
                             sortable>
            </el-table-column>
            <el-table-column label="Phone Number"
                             prop="phone"
                             sortable>
            </el-table-column>
            <el-table-column label="Address"
                             prop="address"
                             sortable>
            </el-table-column>
            <el-table-column label="Last login"
                             prop="lastLogin"
                             sortable>
            </el-table-column>
            <el-table-column label="Actions"
                             min-width="80px"
                             align="center">
                <template v-slot="{row}">
                    <el-dropdown trigger="click" class="dropdown">
                    <span class="btn btn-sm btn-icon-only text-light">
                      <i class="fas fa-ellipsis-v mt-2"></i>
                    </span>
                        <el-dropdown-menu class="dropdown-menu dropdown-menu-arrow show" slot="dropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here {{ row.id}}</a>
                        </el-dropdown-menu>
                    </el-dropdown>
                </template>
            </el-table-column>
        </el-table>
        <div class="card-footer py-4 d-flex justify-content-end">
            <base-pagination v-model="pagination.currentPage"
                             :total="50"
                             :per-page="pagination.perPage">
            </base-pagination>
        </div>
    </div>
</template>

<script>
    import users from '../List/users'
    import {Table, TableColumn, DropdownMenu, DropdownItem, Dropdown} from 'element-ui'

    export default {
        name: "UserListTable",
        components: {
            [Table.name]: Table,
            [TableColumn.name]: TableColumn,
            [Dropdown.name]: Dropdown,
            [DropdownItem.name]: DropdownItem,
            [DropdownMenu.name]: DropdownMenu,
        },
        data() {
            return {
                users,
                searchQuery: '',
                pagination: {
                    perPage: 10,
                    currentPage: 1,
                    perPageOptions: [5, 10, 25, 50],
                    total: 0
                },
            }
        }
    }
</script>

<style scoped>

</style>
