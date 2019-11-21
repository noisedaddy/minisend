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
                    <h3 class="mb-0">{{$t('users')}}</h3>
                </div>
                <div class="col-6 text-right">
                    <router-link to="/dashboard/users/create">
                        <base-button icon type="primary" size="sm">
                            <span class="btn-inner--icon"><i class="fas fa-user-plus"></i></span>
                            <span class="btn-inner--text">{{$t('newUser')}}</span>
                        </base-button>
                    </router-link>
                </div>
            </div>
        </div>
        <el-table
            class="table-responsive table-flush"
            header-row-class-name="thead-light"
            row-key="id"
            :data="users"
            @selection-change="selectionChange">
            <el-table-column type="selection"
                            min-width="120px">
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
            <el-table-column align="center">
                <template v-slot="{row}">
                    <el-dropdown trigger="click" class="dropdown">
                    <span class="btn btn-sm btn-icon-only">
                      <i class="fas fa-ellipsis-v mt-2"></i>
                    </span>
                        <el-dropdown-menu class="dropdown-menu dropdown-menu-arrow show" slot="dropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here {{ row.id }}</a>
                        </el-dropdown-menu>
                    </el-dropdown>
                </template>
            </el-table-column>

        </el-table>
        <div
            slot="footer"
            class="col-12 mt-3 d-flex justify-content-center justify-content-sm-between flex-wrap"
          >
            <div class="">
              <p class="card-category">
                Showing {{ from + 1 }} to {{ to }} of {{ total }} entries

                <span v-if="selectedRows.length">
                  &nbsp; &nbsp; {{selectedRows.length}} rows selected
                </span>
              </p>

            </div>
            <base-pagination
              class="pagination-no-border"
              v-model="pagination.currentPage"
              :per-page="pagination.perPage"
              :total="total"
            >
            </base-pagination>
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
    import usersPaginationMixin from './usersPaginationMixin'
    import UsersAPI from '../../../../services/api/UsersAPI'

    export default {
        name: "UserListTable",
        mixins: [usersPaginationMixin],
        components: {
            [Table.name]: Table,
            [TableColumn.name]: TableColumn,
            [Dropdown.name]: Dropdown,
            [DropdownItem.name]: DropdownItem,
            [DropdownMenu.name]: DropdownMenu,
        },
        data() {
            return {
                users: [],
                selectedRows: [],
            }
        },
        mounted() {
            this.fetchUsers();
        },
        methods: {
            selectionChange(selectedRows) {
                this.selectedRows = selectedRows
            },
            async fetchUsers() {
                const data = await UsersAPI.getAll();
                this.users = data;
            },
        }
    }
</script>

<style scoped>

</style>
