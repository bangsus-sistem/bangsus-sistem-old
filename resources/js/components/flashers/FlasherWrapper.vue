<template>
    <wb-screen>
        <template v-slot:mobile>
            <div class="flasher-mobile-wrapper">
                <slot></slot>
            </div>
        </template>
        <template v-slot:desktop>
            <div class="flasher-desktop-wrapper">
                <slot></slot>
            </div>
        </template>
    </wb-screen>
</template>

<script>
import Screen from '../screen/Screen'

export default {
    components: {
        Screen,
    },
}
</script>