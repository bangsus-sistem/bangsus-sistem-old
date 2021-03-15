<template>
    <div v-html="iconSvg" :class="className"></div>
</template>

<script>
export default {
    props: {
        icon: {
            required: true,
            type: String
        },
        color: {
            type: String,
            default: 'gray-900',
        }
    },
    computed: {
        iconSvg() {
            return feather.icons[this.icon].toSvg()
        },
        className() {
            return 'text-' + this.color
        }
    }
}
</script>