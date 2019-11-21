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
                        collapse-tags
                        v-model="selectedRoles"
                        placeholder="Select roles">
                        <el-option v-for="option in roleOptions"
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
                        v-model="selects.simple">
                        <el-option v-for="option in selects.languages"
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
        data() {
            return {
                selectedRoles: [1,2,3,4],
                roleOptions: [{
                    value: 1,
                    label: 'Super Admin'
                }, {
                    value: 2, 
                    label: 'Account Admin'
                }, {
                    value: 3, 
                    label: 'Account Manager '
                }, {
                    value: 4, 
                    label: 'Evaluator'
                }],
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
            }
        }
    }
</script>