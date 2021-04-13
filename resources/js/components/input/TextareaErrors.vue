<template>
    <div>
        <bsb-textarea
            :value="value"
            @input="$emit('input', $event)"
            :class="{ 'is-invalid': errors.length > 0 }"
            :readonly="readonly"
        />
        <bsb-errors-wrapper :errors="errors" />
    </div>
</template>

<script>
export default {
    props: {
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
        }
    },
}
</script>