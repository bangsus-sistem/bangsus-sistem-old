<template>
    <div>
        <bsb-select
            :type="type"
            :size="size"
            :value="value"
            @input="$emit('input', $event)"
            :options="options"
            :class="{ 'is-invalid': errors.length > 0 }"
            :disabled="disabled"
            @change="$emit('change', $event)"
        >
            <slot></slot>
        </bsb-select>
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
            default: ''
        },
        size: {
            type: String,
            default: 'md'
        },
        errors: {
            type: Array,
            default() {
                return []
            },
        },
        options: {
            type: Array,
            default() {
                return []
            }
        },
        disabled: {
            type: Boolean,
            default: false
        }
    },
}
</script>