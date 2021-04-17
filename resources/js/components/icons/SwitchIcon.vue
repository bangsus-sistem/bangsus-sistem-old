<template>
    <span>
        <bsb-icon :icon="trueIcon" :color="singleColor ? color : successColor" v-if="value" />
        <bsb-icon :icon="falseIcon" :color="singleColor ? color : dangerColor" v-else />
    </span>
</template>

<script>
export default {
    props: {
        value: {
            type: Boolean,
            default: true,
        },
        trueIcon: {
            type: String,
            default: 'check',
        },
        falseIcon: {
            type: String,
            default: 'times',
        },
        singleColor: {
            type: Boolean,
            default: false,
        },
        color: {
            type: String,
            default: 'dark',
        },
        successColor: {
            type: String,
            default: 'success',
        },
        dangerColor: {
            type: String,
            default: 'danger',
        },
    }
}
</script>