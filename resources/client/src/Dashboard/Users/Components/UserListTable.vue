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
                Showing {{ from + 1 }} to {{ to }} of {{ total }} entries

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
        props: {
            users: {
                type: Array,
                required: true
            },
            meta: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                activeRow: null,
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
        }
    }
</script>

<style scoped>

</style>
