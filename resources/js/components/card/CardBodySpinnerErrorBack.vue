<template>
    <bsb-card-body-spinner-error
        :loading="loading"
        :error="error"
        :error-message="errorMessage"
    >
        <template v-slot:always-render>
            <bsb-button-router-link-back :default-back="defaultBack" class="mb-3" />
        </template>
        <slot></slot>
    </bsb-card-body-spinner-error>
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
        defaultBack: {
            default() {
                return { name: 'dashboard' }
            }
        },
    }
}
</script>