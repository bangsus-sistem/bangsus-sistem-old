<template>
    <div>
        <bsb-screen>
            <template v-slot:mobile>
                <div class="px-5">
                    <slot name="mobile" />
                </div>
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
                <bsb-screen-mode-wrapper label="Mode Desktop" />
            </template>
        </bsb-screen>
        <Flashers />
    </div>
</template>

<script>
import Flashers from './sections/Flashers'

export default {
    components: {
        Flashers,
    }
}
</script>