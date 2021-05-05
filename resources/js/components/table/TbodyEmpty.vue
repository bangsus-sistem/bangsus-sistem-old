<template>
    <tbody>
        <slot v-if="items.length > 0" />
        <tr v-else>
            <bsb-td :colspan="col + 2" justify="center">
                {{ emptyLabel }}
            </bsb-td>
        </tr>
    </tbody>
</template>

<script>
export default {
    props: {
        items: {
            default() {
                return []
            }
        },
        emptyLabel: {
            type: String,
            default: 'Data tidak ada.',
        },
        col: {
            type: Number,
            required: true,
        },
    }
}
</script>