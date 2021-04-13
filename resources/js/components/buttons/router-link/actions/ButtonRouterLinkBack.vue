<template>
    <bsb-button color="secondary" size="sm" @click.prevent="click">
        <bsb-button-back-content />
    </bsb-button>
</template>

<script>
export default {
    props: {
        defaultBackLink: {
            default() {
                return { name: 'dashboard' }
            }
        }
    },
    methods: {
        click() {
            this.$router.go(-1)
        },
    }
}
</script>