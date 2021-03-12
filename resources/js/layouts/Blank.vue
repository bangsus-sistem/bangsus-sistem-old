<template>
    <bsb-screen>
        <template v-slot:mobile>
            <slot name="mobile" />
            <bsb-flashers :flashers="flashers" @closed="closeFlasher($event)" />
            <bsb-screen-mode-wrapper label="Mode Mobile" />
        </template>
        <template v-slot:desktop>
            <slot name="desktop" />
            <bsb-flashers :flashers="flashers" @closed="closeFlasher($event)" />
            <bsb-screen-mode-wrapper label="Mode Desktop" />
        </template>
    </bsb-screen>
</template>

<script>
export default {
    computed: {
        flashers() {
            return this.$store.getters['utils/flashers/flashers']
        },
    },
    methods: {
        closeFlasher(id) {
            this.$store.dispatch('utils/flashers/closeFlasher', id)
        }
    },
    created() {
        this.$store.dispatch('utils/flashers/buildStoredFlashersTimeout')
    },
}
</script>