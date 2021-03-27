<template>
    <div>
        <bsb-screen>
            <!-- Mobile -->
            <template v-slot:mobile>
                <Sidebar :active="active"/>
                <div class="px-5">
                    <slot name="mobile" />
                </div>
                <bsb-screen-mode-wrapper label="Mode Mobile" />
            </template>
            <!-- Desktop -->
            <template v-slot:desktop>
                <Sidebar :active="active" />
                <bsb-page-wrapper>
                    <Navbar />
                    <Breadcrumb :breadcrumbs="breadcrumbs" />
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
import Breadcrumb from './sections/Breadcrumb'

export default {
    components: {
        Flashers,
        Sidebar,
        Navbar,
        Breadcrumb,
    },
    props: {
        breadcrumbs: {
            required: true,
            type: Array,
        },
        active: {
            type: String,
            default: '',
        },
    }
}
</script>