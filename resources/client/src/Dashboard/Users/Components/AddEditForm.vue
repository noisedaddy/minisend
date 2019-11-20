<template>
    <div class="card">
        <div class="card-header">
            New User Details
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label form-control-label">First Name</label>
                            <div class="col-md-9">
                                <base-input placeholder="First Name"></base-input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label form-control-label">Last Name</label>
                            <div class="col-md-9">
                                <base-input placeholder="Last Name"></base-input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label form-control-label">Email</label>
                            <div class="col-md-9">
                                <base-input placeholder="Email"></base-input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-password-input"
                                   class="col-md-3 col-form-label form-control-label">Password</label>
                            <div class="col-md-9">
                                <base-input type="password" autocomplete="current-password" placeholder="Password" id="example-password-input"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-password-input"
                                   class="col-md-3 col-form-label form-control-label">Repeat password</label>
                            <div class="col-md-9">
                                <base-input type="password" autocomplete="current-password" placeholder="Repeat password" id="example-repeat-password-input"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-tel-input" class="col-md-3 col-form-label form-control-label">Phone Number</label>
                            <div class="col-md-9">
                                <base-input type="tel" placeholder="Phone number" id="example-tel-input"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label form-control-label">Address</label>
                            <div class="col-md-9">
                                <base-input placeholder="Address"></base-input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label form-control-label">Postion</label>
                            <div class="col-md-9">
                                <base-input placeholder="Position"></base-input>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 text-center">
                    <file-input v-model="fileSingle" id="avatar-upload"></file-input>
                    <label for="avatar-upload" class="mt-2"> JPG or PNG; max: 1MB</label>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-primary mb-3">Create User</button>
        </div>
    </div>
</template>

<script>
    import FileInput from '@argon/components/Inputs/FileInput'
    export default {
        name: "AddEditForm",
        components: {
            FileInput,
        },
        data() {
            return {
                fileSingle: []
            }
        }
    }
</script>

<style scoped>

</style>
