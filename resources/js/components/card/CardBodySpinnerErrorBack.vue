<template>
    <bsb-card-body-spinner-error
        :loading="loading"
        :error="error"
        :error-message="errorMessage"
    >
        <template v-slot:always-render>
            <bsb-button-router-link-back :default-back-link="defaultBackLink" />
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
        defaultBackLink: {
            default() {
                return { name: 'dashboard' }
            }
        },
    }
}
</script>