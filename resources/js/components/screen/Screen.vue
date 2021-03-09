<template>
    <div>
        <template v-if="$isMobile()">
            <slot name="mobile" />
            <bsb-screen-mode-wrapper label="Mode Mobile" />
        </template>
        <template v-else>
            <slot name="desktop" />
            <bsb-screen-mode-wrapper label="Mode Desktop" />
        </template>
    </div>
</template>