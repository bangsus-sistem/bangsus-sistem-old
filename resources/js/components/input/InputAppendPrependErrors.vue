<template>
    <div>
        <bsb-input-append-prepend
            :type="type"
            :value="value"
            @input="$emit('input', $event)"
            :has-error="errors.length > 0"
            :readonly="readonly"
            :prepend-label="prependLabel"
            :append-label="appendLabel"
        />
        <bsb-errors-wrapper :errors="errors" />
    </div>
</template>

<script>
export default {
    props: {
        type: {
            type: String,
            default: 'text',
        },
        value: {
            default: '',
        },
        errors: {
            type: Array,
            default() {
                return []
            },
        },
        readonly: {
            type: Boolean,
            default: false,
        },
        prependLabel: {
            default: null
        },
        appendLabel: {
            default: null
        },
    },
}
</script>