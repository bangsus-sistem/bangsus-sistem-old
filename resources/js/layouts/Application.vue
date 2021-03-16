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
                <Sidebar />
                <bsb-page-wrapper>
                    <Navbar />
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
import Sidebar from './sections/Sidebar'
import Navbar from './sections/Navbar'

export default {
    components: {
        Flashers,
        Sidebar,
        Navbar,
    }
}
</script>