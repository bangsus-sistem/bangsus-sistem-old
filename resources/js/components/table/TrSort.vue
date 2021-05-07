<template>
    <tr>
        <bsb-th>#</bsb-th>
        <bsb-th-sort
            v-for="(sortOrder, i) in sortOrders"
            :key="i"
            :sort="sort == sortOrder.index"
            :order="order"
            @click="clickSortOrder(sortOrder.index)"
        >
            {{ sortOrder.title }}
        </bsb-th-sort>
        <bsb-th justify="center">
            Aksi
        </bsb-th>
    </tr>
</template>

<script>
export default {
    props: {
        sortOrders: {
            type: Array,
            default() {
                return []
            },
        },
        value: {
            type: Object,
            default() {
                return {}
            },
        },
        sort: {
            type: String,
            required: true,
        },
        order: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            query: {}
        }
    },
    created() {
        this.query = this.value
    },
    watch: {
        query(ne, old) {
            this.$emit('input', ne)
        }
    },
    methods: {
        clickSortOrder(index) {
            this.$emit('sort', index)
        }
    }
}
</script>