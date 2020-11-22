<template>
    <div class="card">
        <div class="card-header">
            <h3>{{$t('filters')}}</h3>
        </div>
        <form role="form" class="col-md-12">
            <div class="card-body">
                <div class="row">
                    <base-input class="col-12" label="Search Options">
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
                    <base-input class="col-12" label="Search Term" v-model="search_phrase">
                    </base-input>
                </div>
                <div class="form-group row">
                    <base-button type="primary"
                                 class="my-4"
                                 @click="searchStart()">
                        {{ $t('Search') }}
                    </base-button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    import EmailAPI from "@services/api/EmailAPI";
    import EmailListTable from "@src/Dashboard/Emails/Components/EmailListTable";

    export default {
        name: 'EmailListFilters',
        props: {
            value: {
                type: Object,
                default: () => {}
            }
        },
        data() {
            return {
                search_phrase: ''
            }
        },
        methods: {
            searchStart() {
                console.log(this.value);
                EmailAPI
                    .search(this.search_phrase,this.value)
                    .then((data) => {
                        this.$emit('searchStart', data);
                    })
                    .catch((err) => {
                        console.log(err);
                    })
            }
        }
    }
</script>
