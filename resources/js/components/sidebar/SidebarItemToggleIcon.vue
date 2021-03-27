<template>
    <bsb-feather-icon icon="chevron-up" class="sidebar-item-toggle-icon" v-if="collapse" />
    <bsb-feather-icon icon="chevron-down" class="sidebar-item-toggle-icon" v-else />
</template>

<script>
export default {
    props: {
        collapse: {
            type: Boolean,
        }
    }
}
</script>