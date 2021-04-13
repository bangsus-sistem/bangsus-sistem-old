<template>
    <bsb-card-body>
        <bsb-col class="text-center" v-if="loading">
            <bsb-spinner />
        </bsb-col>
        <slot v-else></slot>
    </bsb-card-body>
</template>

<script>
export default {
    props: {
        loading: {
            type: Boolean,
            default: false,
        },
    }
}
</script>