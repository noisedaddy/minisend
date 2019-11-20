<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3>{{$t('filters')}}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <button-radio-group :options="radioOptions"
                                                    button-classes="btn-secondary"
                                                    v-model="buttonRadioGroup">
                                    </button-radio-group>
                                </div>                                
                            </div>
                            <div class="row mt-3">
                                <el-select class="col-12 select-danger"
                                    placeholder="Company"
                                    label="Example select"
                                    v-model="selects.simple">
                                    <el-option v-for="option in selects.languages"
                                            class="select-danger"
                                            :value="option.value"
                                            :label="option.label"
                                            :key="option.label">
                                    </el-option>
                                </el-select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9">
                    <user-list-table></user-list-table>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    import ButtonRadioGroup from '@argon/components/ButtonRadioGroup'
    import UserListTable from '../Components/UserListTable';

    export default {
        name: "ListUsersIndex",
        components: {
            UserListTable,
            ButtonRadioGroup,
        },
        data() {
            return {
                radioOptions: [{
                    value: '1',
                    label: 'Super Admin'
                }, {
                    value: '2', 
                    label: 'Account Admin'
                }, {
                    value: '3', 
                    label: 'Account Manager '
                }, {
                    value: '4', 
                    label: 'Evaluator'
                }],
                buttonRadioGroup: '1',
                selects: {
                    simple: '',
                    languages: [{value: 'Bahasa Indonesia', label: 'Bahasa Indonesia'},
                    {value: 'Bahasa Melayu', label: 'Bahasa Melayu'},
                    {value: 'Català', label: 'Català'},
                    {value: 'Dansk', label: 'Dansk'},
                    {value: 'Deutsch', label: 'Deutsch'},
                    {value: 'English', label: 'English'},
                    {value: 'Español', label: 'Español'},
                    {value: 'Eλληνικά', label: 'Eλληνικά'},
                    {value: 'Français', label: 'Français'},
                    {value: 'Italiano', label: 'Italiano'},
                    {value: 'Magyar', label: 'Magyar'},
                    {value: 'Nederlands', label: 'Nederlands'},
                    {value: 'Norsk', label: 'Norsk'},
                    {value: 'Polski', label: 'Polski'},
                    {value: 'Português', label: 'Português'},
                    {value: 'Suomi', label: 'Suomi'},
                    {value: 'Svenska', label: 'Svenska'},
                    {value: 'Türkçe', label: 'Türkçe'},
                    {value: 'Íslenska', label: 'Íslenska'},
                    {value: 'Čeština', label: 'Čeština'},
                    {value: 'Русский', label: 'Русский'},
                    {value: 'ภาษาไทย', label: 'ภาษาไทย'},
                    {value: '中文 (简体)', label: '中文 (简体)'},
                    {value: 'W">中文 (繁體)', label: 'W">中文 (繁體)'},
                    {value: '日本語', label: '日本語'},
                    {value: '한국어', label: '한국어'}]
                },
            };
        }
    };
</script>
<style></style>
