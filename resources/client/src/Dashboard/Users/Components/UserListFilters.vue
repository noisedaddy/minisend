<template>
    <div class="card">
        <div class="card-header">
            <h3>{{$t('filters')}}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <base-input class="col-12" label="Roles">
                    <el-select multiple
                        id="role-select"
                        class="select-primary"
                        v-model="value.role"
                        placeholder="Select roles">
                        <el-option v-for="option in value.roleOptions"
                                class="select-primary"
                                :value="option.value"
                                :label="option.label"
                                :key="option.label">
                        </el-option>
                    </el-select>
                </base-input>
            </div>
            <div class="row mt-3">
                <base-input class="col-12" label="Company">
                    <el-select id="company-select"
                        class="select-primary"
                        placeholder="Select a company"
                        label="Example select"
                        v-model="value.selects.simple">
                        <el-option v-for="option in value.selects.languages"
                                class="select-danger"
                                :value="option.value"
                                :label="option.label"
                                :key="option.label">
                        </el-option>
                    </el-select>
                </base-input>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'UserListFilters',
        props: {
            value: {
                type: Object,
                default: () => {}
            }
        },
        data() {
            return {

            }
        }
    }
</script>