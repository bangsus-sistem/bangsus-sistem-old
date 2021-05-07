<template>
    <div v-frag>
        <bsb-form-check v-for="(option, i) in options" :key="i">
            <input class="form-check-input" type="radio" v-model="switchValue" :value="option.val" :disabled="readonly">
            <bsb-form-check-label :label="option.label" />
        </bsb-form-check>
    </div>
</template>

<script>
export default {
    props: {
        options: {
            type: Array,
            default() {
                return []
            },
        },
        value: {
            default: null,
        },
        readonly: {
            type: Boolean,
            default: false,
        },
    },
    created() {
        this.switchValue = this.value
    },
    data() {
        return {
            switchValue: null,
        }
    },
    watch: {
        switchValue(ne, old) {
            this.$emit('input', ne)
        }
    }
}
</script>