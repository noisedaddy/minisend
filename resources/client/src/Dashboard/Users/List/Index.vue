<template>
    <div>
        <base-header class="pb-6" type="">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                        <ol class="breadcrumb breadcrumb-links">
                            <li class="breadcrumb-item">
                                <router-link to="/"><i class="fas fa-home"></i></router-link>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </base-header>

        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-12">
                    <h1>Hey hey hey</h1>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    import BaseHeader from '@argon/components/BaseHeader';

    export default {
        name: "ListUsersIndex",
        components: {
            BaseHeader,
        },
        data() {
            return {};
        }
    };
</script>
<style></style>
