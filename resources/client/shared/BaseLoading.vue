<template>
    <div :class="{'full-page' : fullPage === true}" class="baseLoading">
        <div>
            <i class="fas fa-circle-notch fa-spin text-otest"></i>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BaseLoading",
        props: {
            fullPage: {
                type: Boolean,
                default: false
            }
        }
    }
</script>

<style scoped>
    .full-page {
        position: absolute;
        z-index: 99999;
        height: 100vh;
        width: 100vw;
        background: #f8f9fe;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .baseLoading {
        font-size: 150px;
        text-align: center;
    }
</style>
