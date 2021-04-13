<template>
    <bsb-select size="sm"
        :options="countOptions"
        :value="value"
        @input="$emit('input', $event)"
    />
</template>

<script>
export default {
    props: {
        options: {
            type: Array,
            default() {
                return []
            }
        },
        value: {
            
        }
    },
    computed: {
        countOptions() {
            let options = []

            this.options.forEach(val => {
                options.push({
                    value: parseInt(val),
                    title: val.toString(),
                })
            })

            return options
        }
    }
}
</script>