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
    import CovidAPI from "@services/api/CovidAPI";

    export default {
        name: "OverviewIndex",
        components: {
            BaseBreadcrumbs,
            BaseHeader,
        },
        data() {
            return {
                isLoading: true,
                covid: {data: [], meta: {}},
            };
        },
        mounted() {
            this.fetchCovid();
        },
        methods: {
            async fetchCovid(){
                this.isLoading = true;
                this.covid = await CovidAPI.getAll();
                console.log(this.covid);
                this.isLoading = false;
            }
        }
    };
</script>
<style></style>
