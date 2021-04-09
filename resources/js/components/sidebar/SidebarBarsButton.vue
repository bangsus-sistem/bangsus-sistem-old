<template>
    <bsb-button color="none" @click="click" class="p-0">
        <bsb-feather-icon icon="menu" :size="20" class="sidebar-bars-button" :color="color" />
    </bsb-button>
</template>

<script>
export default {
    props: {
        darkMode: {
            type: Boolean,
            default: false,
        },
    },
    methods: {
        click(e) {
            this.$emit('click', e)
        }
    },
    computed: {
        color() {
            return this.darkMode ? 'white' : 'black'
        }
    }
}
</script>