<template>
    <div v-frag>
        <wb-form-check v-for="(option, i) in options" :key="i">
            <input class="form-check-input" type="radio" v-model="switchValue" :value="option.val" :disabled="readonly">
            <wb-form-check-label :label="option.label" />
        </wb-form-check>
    </div>
</template>

<script>
import FormCheck from './FormCheck'
import FormCheckLabel from './FormCheckLabel'

export default {
    components: {
        FormCheck,
        FormCheckLabel,
    },
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