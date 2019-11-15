<template>
    <div>
        <base-header class="pb-6" type="">
            <div class="row align-items-center py-4">
                <BaseBreadcrumbs></BaseBreadcrumbs>
            </div>
        </base-header>

        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-12">
                    <h1>Hey!</h1>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    import BaseHeader from '@argon/components/BaseHeader';
    import BaseBreadcrumbs from "@/shared/BaseBreadcrumbs";

    export default {
        name: "OverviewIndex",
        components: {
            BaseBreadcrumbs,
            BaseHeader,
        },
        data() {
            return {};
        }
    };
</script>
<style></style>
