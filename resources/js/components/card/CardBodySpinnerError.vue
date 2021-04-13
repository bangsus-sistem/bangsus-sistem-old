<template>
    <bsb-card-body-spinner :loading="loading">
        <slot name="always-render"></slot>
        <template v-if="error">
            <bsb-alert color="danger" class="mt-3">
                {{ errorMessage }}
            </bsb-alert>
        </template>
        <template v-else>
            <slot></slot>
        </template>
    </bsb-card-body-spinner>
</template>

<script>
export default {
    props: {
        loading: {
            type: Boolean,
            default: false,
        },
        error: {
            type: Boolean,
            default: false,
        },
        errorMessage: {
            default: '',
        },
    }
}
</script>