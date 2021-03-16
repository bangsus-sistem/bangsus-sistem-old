<template>
    <div>
        <bsb-screen>
            <template v-slot:mobile>
                <div class="px-3">
                    <slot name="mobile" />
                </div>
                <bsb-screen-mode-wrapper label="Mode Mobile" />
            </template>
            <template v-slot:desktop>
                <slot name="desktop" />
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