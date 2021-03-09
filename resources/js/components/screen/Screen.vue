<template>
    <div>
        <template v-if="$isMobile()">
            <slot name="mobile" />
            <div class="screen-mode-wrapper">
                Mode Mobile
            </div>
        </template>
        <template v-else>
            <slot name="desktop" />
            <div class="screen-mode-wrapper">
                Mode Desktop
            </div>
        </template>
    </div>
</template>