<template>
    <bsb-badge color="success" v-if="condition">{{ trueLabel }}</bsb-badge>
    <bsb-badge color="danger" v-else>{{ falseLabel }}</bsb-badge>
</template>

<script>
export default {
    props: {
        condition: {
            required: true,
        },
        trueLabel: {
            type: String,
            default: 'true'
        },
        falseLabel: {
            type: String,
            default: 'false'
        }
    }
}
</script>