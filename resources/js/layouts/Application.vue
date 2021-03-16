<template>
    <div>
        <bsb-screen>
            <template v-slot:mobile>
                <slot name="mobile" />
                <bsb-flashers :flashers="flashers" @closed="closeFlasher($event)" />
                <bsb-screen-mode-wrapper label="Mode Mobile" />
            </template>
            <template v-slot:desktop>
                <bsb-sidebar>
                    <bsb-sidebar-title>Bangsus Sistem</bsb-sidebar-title>
                </bsb-sidebar>
                <bsb-page-wrapper>
                    <bsb-navbar>
                        <bsb-breadcrumb>
                            <bsb-breadcrumb-item>
                                <a href="#">Home</a>
                            </bsb-breadcrumb-item>
                            <bsb-breadcrumb-item>
                                <a href="#">Library</a>
                            </bsb-breadcrumb-item>
                            <bsb-breadcrumb-item :active="true">
                                Data
                            </bsb-breadcrumb-item>
                        </bsb-breadcrumb>
                    </bsb-navbar>
                    <bsb-container-fluid class="px-4 pt-4">
                        <slot name="desktop" />
                    </bsb-container-fluid>
                </bsb-page-wrapper>
                <bsb-flashers :flashers="flashers" @closed="closeFlasher($event)" />
                <bsb-screen-mode-wrapper label="Mode Desktop" />
            </template>
        </bsb-screen>
    </div>
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