<template>
    <bsb-list-group>
        <slot v-if="items.length > 0" />
        <bsb-list-group-item v-else class="text-center">
            {{ emptyLabel }}
        </bsb-list-group-item>
    </bsb-list-group>
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
            default: 'Data tidak ditemukan',
        },
    }
}
</script>