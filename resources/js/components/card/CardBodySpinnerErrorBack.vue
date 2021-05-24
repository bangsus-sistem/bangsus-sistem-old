<template>
    <CardBodySpinnerError
        :loading="loading"
        :error="error"
        :error-message="errorMessage"
    >
        <template v-slot:always-render>
            <ButtonRouterLinkBack :default-back="defaultBack" class="mb-3" />
        </template>
        <slot></slot>
    </CardBodySpinnerError>
</template>

<script>
import CardBodySpinnerError from './CardBodySpinnerError'
import ButtonRouterLinkBank from '../buttons/router-link/actions/ButtonRouterLinkBack'

export default {
    components: {
        CardBodySpinnerError,
        ButtonRouterLinkBank,
    },
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