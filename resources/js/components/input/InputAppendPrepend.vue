<template>
    <bsb-input-group>
        <bsb-input-group-prepend v-if="prependLabel">
            <bsb-input-group-text :label="prependLabel" />
        </bsb-input-group-prepend>
        <bsb-input
            :type="type"
            :value="value"
            @input="$emit('input', $event)"
            :readonly="readonly"
            :class="{ 'is-invalid': hasError }"
        />
        <bsb-input-group-append v-if="appendLabel">
            <bsb-input-group-text :label="appendLabel" />
        </bsb-input-group-append>
    </bsb-input-group>
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
        hasError: {
            type: Boolean,
            default: false,
        }
    },
}
</script>