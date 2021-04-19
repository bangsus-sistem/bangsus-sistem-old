<template>
    <bsb-button color="secondary" size="sm" @click.prevent="click">
        <bsb-button-back-content />
    </bsb-button>
</template>

<script>
export default {
    props: {
        defaultBack: {
            default() {
                return { name: 'dashboard' }
            }
        }
    },
    methods: {
        click() {
            const route = this.$store.getters['utils/history/latestBeforePlain']
            if (route != null) {
                this.$router.replace(route)
            } else {
                this.$router.replace(this.defaultBack)
            }
        },
    }
}
</script>